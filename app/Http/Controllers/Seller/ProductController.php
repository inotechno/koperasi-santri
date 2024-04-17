<?php

namespace App\Http\Controllers\Seller;

use App\Models\Store;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('seller.products.index', [
            'title' => 'Daftar Barang'
        ]);
    }

    public function publish(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('product_sub_category')->where('status_product', '=', 'publish')->where('store_id', auth()->user()->load('store')->store->id);

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('product_sub_category', function (Product $product) {
                    return $product->product_sub_category->product_category->name . ' / ' . $product->product_sub_category->name;
                })
                ->addColumn('product_price', function (Product $product) {
                    if ($product->discount !== null) {
                        return '<small class="text-warning"><s>' . number_format($product->price) . '</s></small><h6>' . number_format($product->discount) . '</h6>';
                    }

                    return '<h6>' . number_format($product->price) . '</h6>';
                })
                ->addColumn('selection', function ($row) {
                    return '<div class="form-check">
                                <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                            </div>';
                })
                ->addColumn('action', function ($row) {
                    $disc = '<button class="dropdown-item discount-item" data-id="' . $row->id . '" data-price="' . $row->price . '"><i class="ri-price-tag-3-line align-bottom me-2 text-muted"></i> Discount</button>';

                    if ($row->discount !== null) {
                        $disc = '<button class="dropdown-item remove-discount" data-id="' . $row->id . '" data-price="' . $row->price . '"><i class="ri-price-tag-3-line text-danger align-bottom me-2"></i>Remove Discount</button>';
                    }

                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="' . route("product.detail", $row->slug) . '" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a href="' . route('product.edit', $row->slug) . '" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>' . $disc . '</li>
                                        <li><button class="dropdown-item draft-item" data-id="' . $row->id . '"><i class="ri-draft-line align-bottom me-2 text-muted"></i> Draft</button></li>
                                        <li><button class="dropdown-item remove-item" data-id="' . $row->id . '"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</button></li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'product_price'])
                ->make(true);
        }
    }

    public function draft(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('product_sub_category')->where('status_product', '=', 'draft')->where('store_id', auth()->user()->load('store')->store->id);

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('product_sub_category', function (Product $product) {

                    return $product->product_sub_category->name;
                })
                ->addColumn('selection', function ($row) {
                    return '<div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><button class="dropdown-item publish-item" data-id="' . $row->id . '"><i class="ri-global-fill align-bottom me-2 text-muted"></i> Publish</button></li>
                                        <li><button class="dropdown-item remove-item" data-id="' . $row->id . '"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</button></li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::whereHas('useraddress', function ($query) {
            return $query->where('store_address', 'on');
        })->find(Auth::id());
        // dd($user);
        if ($user == null) {
            return redirect()->route('user.setting')->with('error', 'Tambah alamat toko terlebih dahulu');
        }

        if ($user->phone == NULL || $user->jenis_kelamin == NULL || $user->tanggal_lahir == NULL || $user->bank_name == NULL || $user->rekening == NULL || $user->rekening_atas_nama == NULL) {
            return redirect()->route('user.setting')->with('error', 'Lengkapi data terlebih dahulu');
        }

        $category = ProductSubCategory::all();
        return view('seller.products.create', [
            'title' => 'Tambah Produk',
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'image1' => 'mimes:jpg,png,jpeg|max:5000',
            'image2' => 'mimes:jpg,png,jpeg|max:5000',
            'image3' => 'mimes:jpg,png,jpeg|max:5000',
            'image4' => 'mimes:jpg,png,jpeg|max:5000',
            'image5' => 'mimes:jpg,png,jpeg|max:5000',
            'title' => 'required|unique:products|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'min:10',
            'minimum_order' => 'numeric',
            'weight'    => 'required|numeric',
            'long'  => 'numeric',
            'width' => 'numeric',
            'tall' => 'numeric',
            'height'    => 'numeric',
            'process_time' => 'numeric',
            'product_sub_category_id' => 'required'
        ]);

        $validatedData['store_id'] = auth()->user()->store->id;
        $validatedData['status_product'] = 'publish';
        if ($request->has('draft_add')) {
            $validatedData['status_product'] = 'draft';
        }
        $validatedData['slug'] = Str::slug($validatedData['title']);

        if ($request->file('image1')) {
            $image1 = $request->file('image1');
            $validatedData['image1'] = $validatedData['slug'] . '-' . time() . '1.' . $image1->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image1->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image1']);

            $destinationPath = public_path('/storage/product_images');
            $image1->move($destinationPath, $validatedData['image1']);
        }

        if ($request->file('image2')) {
            $image2 = $request->file('image2');
            $validatedData['image2'] = $validatedData['slug'] . '-' . time() . '2.' . $image2->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image2->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image2']);

            $destinationPath = public_path('/storage/product_images');
            $image2->move($destinationPath, $validatedData['image2']);
        }

        if ($request->file('image3')) {
            $image3 = $request->file('image3');
            $validatedData['image3'] = $validatedData['slug'] . '-' . time() . '3.' . $image3->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image3->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image3']);

            $destinationPath = public_path('/storage/product_images');
            $image3->move($destinationPath, $validatedData['image3']);
        }

        if ($request->file('image4')) {
            $image4 = $request->file('image4');
            $validatedData['image4'] = $validatedData['slug'] . '-' . time() . '4.' . $image4->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image4->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image4']);

            $destinationPath = public_path('/storage/product_images');
            $image4->move($destinationPath, $validatedData['image4']);
        }

        if ($request->file('image5')) {
            $image5 = $request->file('image5');
            $validatedData['image5'] = $validatedData['slug'] . '-' . time() . '5.' . $image5->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image5->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image5']);

            $destinationPath = public_path('/storage/product_images');
            $image5->move($destinationPath, $validatedData['image5']);
        }

        Product::create($validatedData);
        $request->session()->flash('success', 'Produk berhasil ditambahkan');

        if ($request->has('sell_add')) {
            return back();
        }

        return redirect('/seller/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = ProductSubCategory::all();
        $product = Product::where('slug', $slug)->first();
        // dd($product);
        return view('seller.products.edit', [
            'title' => 'Ubah Data Barang',
            'product' => $product,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // dd($request);

        $product = Product::where('slug', $slug)->first();

        $validatedData = $request->validate([
            'image1' => 'mimes:jpg,png,jpeg|max:5000',
            'image2' => 'mimes:jpg,png,jpeg|max:5000',
            'image3' => 'mimes:jpg,png,jpeg|max:5000',
            'image4' => 'mimes:jpg,png,jpeg|max:5000',
            'image5' => 'mimes:jpg,png,jpeg|max:5000',
            'title' => 'required|max:255|unique:products,title,' . $product->id,
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'min:10',
            'minimum_order' => 'numeric',
            'weight'    => 'required|numeric',
            'long'  => 'numeric',
            'width' => 'numeric',
            'tall' => 'numeric',
            'height'    => 'numeric',
            'process_time' => 'numeric',
            'product_sub_category_id' => 'required'
        ]);

        $data['title'] = $request->title;
        $data['price'] = $request->price;
        $data['stock'] = $request->stock;
        $data['description'] = $request->description;
        $data['minimum_order'] = $request->minimum_order;
        $data['weight'] = $request->weight;
        $data['long'] = $request->long;
        $data['width'] = $request->width;
        $data['condition'] = $request->condition;
        $data['tall'] = $request->tall;
        $data['height'] = $request->height;
        $data['url_video'] = $request->url_video;
        $data['process_time'] = $request->process_time;
        $data['product_sub_category_id'] = $request->product_sub_category_id;
        $data['store_id'] = auth()->user()->store->id;
        $data['status_product'] = 'publish';
        $data['slug'] = Str::slug($data['title']);

        if ($request->file('image1')) {

            $image1 = $request->file('image1');
            $data['image1'] = $data['slug'] . '-' . time() . '1.' . $image1->extension();

            $public = public_path('/thumbnail/product_images');
            $img = Image::make($image1->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public . '/' . $data['image1']);

            $storage = public_path('/storage/product_images');
            $image1->move($storage, $data['image1']);

            if (Storage::disk('public')->exists('product_images/' . $request->image1_last)) {
                Storage::disk('public')->delete('product_images/' . $request->image1_last);
                File::delete('thumbnail/product_images/' . $request->image1_last);
            }
        } else {
            $data['image1'] = $request->image1_last;
        }

        if ($request->file('image2')) {
            $image2 = $request->file('image2');
            $data['image2'] = $data['slug'] . '-' . time() . '2.' . $image2->extension();

            $public = public_path('/thumbnail/product_images');
            $img = Image::make($image2->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public . '/' . $data['image2']);

            $storage = public_path('/storage/product_images');
            $image2->move($storage, $data['image2']);

            if (Storage::disk('public')->exists('product_images/' . $request->image2_last)) {
                Storage::disk('public')->delete('product_images/' . $request->image2_last);
                File::delete('thumbnail/product_images/' . $request->image2_last);
            }
        } else {
            $data['image2'] = $request->image2_last;
        }

        if ($request->file('image3')) {

            $image3 = $request->file('image3');
            $data['image3'] = $data['slug'] . '-' . time() . '3.' . $image3->extension();

            $public = public_path('/thumbnail/product_images');
            $img = Image::make($image3->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public . '/' . $data['image3']);

            $storage = public_path('/storage/product_images');
            $image3->move($storage, $data['image3']);

            if (Storage::disk('public')->exists('product_images/' . $request->image3_last)) {
                Storage::disk('public')->delete('product_images/' . $request->image3_last);
                File::delete('thumbnail/product_images/' . $request->image3_last);
            }
        } else {
            $data['image3'] = $request->image3_last;
        }

        if ($request->file('image4')) {
            $image4 = $request->file('image4');
            $data['image4'] = $data['slug'] . '-' . time() . '4.' . $image4->extension();

            $public = public_path('/thumbnail/product_images');
            $img = Image::make($image4->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public . '/' . $data['image4']);

            $storage = public_path('/storage/product_images');
            $image4->move($storage, $data['image4']);

            if (Storage::disk('public')->exists('product_images/' . $request->image4_last)) {
                Storage::disk('public')->delete('product_images/' . $request->image4_last);
                File::delete('thumbnail/product_images/' . $request->image4_last);
            }
        } else {
            $data['image4'] = $request->image4_last;
        }

        if ($request->file('image5')) {
            $image5 = $request->file('image5');
            $data['image5'] = $data['slug'] . '-' . time() . '5.' . $image5->extension();

            $public = public_path('/thumbnail/product_images');
            $img = Image::make($image5->path());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public . '/' . $data['image5']);

            $storage = public_path('/storage/product_images');
            $image5->move($storage, $data['image5']);

            if (Storage::disk('public')->exists('product_images/' . $request->image5_last)) {
                Storage::disk('public')->delete('product_images/' . $request->image5_last);
                File::delete('thumbnail/product_images/' . $request->image5_last);
            }
        } else {
            $data['image5'] = $request->image5_last;
        }

        $product->update($data);
        $request->session()->flash('success', 'Produk berhasil diubah');
        // dd($product);
        if ($request->has('sell_add')) {
            return back();
        }

        return redirect('/seller/products');
    }

    public function discountProduct(Request $request, $id)
    {
        // dd($request);

        $product = Product::find($id);

        $validatedData = $request->validate([
            'discount' => 'required|numeric',
        ]);

        $data['discount'] = $product->price - ($product->price * $request->discount / 100);

        $product->update($data);
        $request->session()->flash('success', 'Harga produk berhasil dipotong');

        return redirect('/seller/products');
    }

    public function removeDiscount($id)
    {
        // dd($request);

        $product = Product::find($id);
        try {
            $data['discount'] = NULL;
            $product->update($data);

            return redirect('/seller/products')->with('success', 'Harga produk berhasil dipotong');
        } catch (\Exception $e) {
            return redirect('/seller/products')->with('error', $e->getMessage());
        }
        //throw $th;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        try {
            $product->delete();
            request()->session()->flash('success', 'Produk berhasil dihapus');

            if (!empty($product->image1)) {
                if (Storage::disk('public')->exists('product_images/' . $product->image1)) {
                    Storage::disk('public')->delete('product_images/' . $product->image1);
                    File::delete(public_path('thumbnail/product_images/' . $product->image1));
                }
            }

            if (!empty($product->image2)) {
                if (Storage::disk('public')->exists('product_images/' . $product->image2)) {
                    Storage::disk('public')->delete('product_images/' . $product->image2);
                    File::delete(public_path('thumbnail/product_images/' . $product->image2));
                }
            }

            if (!empty($product->image3)) {
                if (Storage::disk('public')->exists('product_images/' . $product->image3)) {
                    Storage::disk('public')->delete('product_images/' . $product->image3);
                    File::delete(public_path('thumbnail/product_images/' . $product->image3));
                }
            }

            if (!empty($product->image4)) {
                if (Storage::disk('public')->exists('product_images/' . $product->image4)) {
                    Storage::disk('public')->delete('product_images/' . $product->image4);
                    File::delete(public_path('thumbnail/product_images/' . $product->image4));
                }
            }

            if (!empty($product->image5)) {
                if (Storage::disk('public')->exists('product_images/' . $product->image5)) {
                    Storage::disk('public')->delete('product_images/' . $product->image5);
                    File::delete(public_path('thumbnail/product_images/' . $product->image5));
                }
            }

            return redirect('/seller/products');
        } catch (\Exception $th) {
            request()->session()->flash('error', $th->getMessage());
        }
    }

    public function draftProduct($id)
    {
        $product = Product::find($id);
        try {
            $product->status_product = 'draft';
            $product->save();
            request()->session()->flash('success', 'Produk berhasil dimasukan ke draft');

            return redirect('/seller/products');
        } catch (\Exception $th) {
            request()->session()->flash('error', $th->getMessage());
        }
    }

    public function publishProduct($id)
    {
        $product = Product::find($id);
        try {
            $product->status_product = 'publish';
            $product->save();
            request()->session()->flash('success', 'Produk berhasil dipublish');

            return redirect('/seller/products');
        } catch (\Exception $th) {
            request()->session()->flash('error', $th->getMessage());
        }
    }
}
