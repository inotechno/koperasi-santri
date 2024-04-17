<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index', [
            'title' => 'Daftar Barang'
        ]);
    }

    public function publish(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('product_sub_category')->where('status_product', '=', 'publish');

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('store', function (Product $product) {
                    return $product->load('store')->store->name;
                })
                ->addColumn('product_sub_category', function (Product $product) {
                    return $product->product_sub_category->product_category->name . ' / ' . $product->product_sub_category->name;
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
                                        <li><a href="' . route("product.detail", $row->slug) . '" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a href="' . route('admin.product.edit', $row->slug) . '" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection'])
                ->make(true);
        }
    }

    public function draft(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('product_sub_category')->where('status_product', '=', 'draft');

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('store', function (Product $product) {
                    return $product->load('store')->store->name;
                })
                ->addColumn('product_sub_category', function (Product $product) {
                    return $product->product_sub_category->product_category->name . ' / ' . $product->product_sub_category->name;
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
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </a>
                                        </li>
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
            'height'    => 'numeric',
            'process_time' => 'numeric',
            'product_sub_category_id' => 'required'
        ]);

        $validatedData['store_id'] = auth()->user()->store->id;
        $validatedData['status_product'] = 'publish';
        $validatedData['slug'] = Str::slug($validatedData['title']);

        if ($request->file('image1')) {
            $image1 = $request->file('image1');
            $validatedData['image1'] = $validatedData['slug'] . '-' . time() . '1.' . $image1->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image1->path());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image1']);

            $destinationPath = public_path('/storage/product_images');
            $image1->move($destinationPath, $validatedData['image1']);

            // $image1 = $validatedData['slug'] . '-' . time() . '1.' . $request->image1->extension();
            // $path1 = $request->file('image1')->storeAs('product_images', $image1, 'public');
            // $validatedData['image1'] = "/storage/{$path1}";
        }

        if ($request->file('image2')) {
            $image2 = $request->file('image2');
            $validatedData['image2'] = $validatedData['slug'] . '-' . time() . '2.' . $image2->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image2->path());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image2']);

            $destinationPath = public_path('/storage/product_images');
            $image2->move($destinationPath, $validatedData['image2']);

            // $image2 = $validatedData['slug'] . '-' . time() . '2.' . $request->image2->extension();
            // $path2 = $request->file('image2')->storeAs('product_images', $image2, 'public');
            // $validatedData['image2'] = "/storage/{$path2}";
        }

        if ($request->file('image3')) {
            $image3 = $request->file('image3');
            $validatedData['image3'] = $validatedData['slug'] . '-' . time() . '3.' . $image3->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image3->path());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image3']);

            $destinationPath = public_path('/storage/product_images');
            $image3->move($destinationPath, $validatedData['image3']);

            // $image3 = $validatedData['slug'] . '-' . time() . '3.' . $request->image3->extension();
            // $path3 = $request->file('image3')->storeAs('product_images', $image3, 'public');
            // $validatedData['image3'] = "/storage/{$path3}";
        }

        if ($request->file('image4')) {
            $image4 = $request->file('image4');
            $validatedData['image4'] = $validatedData['slug'] . '-' . time() . '4.' . $image4->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image4->path());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image4']);

            $destinationPath = public_path('/storage/product_images');
            $image4->move($destinationPath, $validatedData['image4']);

            // $image4 = $validatedData['slug'] . '-' . time() . '4.' . $request->image4->extension();
            // $path4 = $request->file('image4')->storeAs('product_images', $image4, 'public');
            // $validatedData['image4'] = "/storage/{$path4}";
        }

        if ($request->file('image5')) {
            $image5 = $request->file('image5');
            $validatedData['image5'] = $validatedData['slug'] . '-' . time() . '5.' . $image5->extension();

            $destinationPath = public_path('/thumbnail/product_images');
            $img = Image::make($image5->path());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $validatedData['image5']);

            $destinationPath = public_path('/storage/product_images');
            $image5->move($destinationPath, $validatedData['image5']);

            // $image5 = $validatedData['slug'] . '-' . time() . '5.' . $request->image5->extension();
            // $path5 = $request->file('image5')->storeAs('product_images', $image5, 'public');
            // $validatedData['image5'] = "/storage/{$path5}";
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
            'height'    => 'numeric',
            'process_time' => 'numeric',
            'product_sub_category_id' => 'required'
        ]);

        $validatedData['store_id'] = auth()->user()->store->id;
        $validatedData['status_product'] = 'publish';
        $validatedData['slug'] = Str::slug($validatedData['title']);

        if ($request->file('image1')) {
            $image1 = $validatedData['slug'] . '-' . time() . '1.' . $request->image1->extension();
            $path1 = $request->file('image1')->storeAs('product_images', $image1, 'public');
            $validatedData['image1'] = "/storage/{$path1}";
        } else {
            unset($request->image1);
        }

        if ($request->file('image2')) {
            $image2 = $validatedData['slug'] . '-' . time() . '2.' . $request->image2->extension();
            $path2 = $request->file('image2')->storeAs('product_images', $image2, 'public');
            $validatedData['image2'] = "/storage/{$path2}";
        } else {
            unset($request->image2);
        }

        if ($request->file('image3')) {
            $image3 = $validatedData['slug'] . '-' . time() . '3.' . $request->image3->extension();
            $path3 = $request->file('image3')->storeAs('product_images', $image3, 'public');
            $validatedData['image3'] = "/storage/{$path3}";
        } else {
            unset($request->image3);
        }

        if ($request->file('image4')) {
            $image4 = $validatedData['slug'] . '-' . time() . '4.' . $request->image4->extension();
            $path4 = $request->file('image4')->storeAs('product_images', $image4, 'public');
            $validatedData['image4'] = "/storage/{$path4}";
        } else {
            unset($request->image4);
        }

        if ($request->file('image5')) {
            $image5 = $validatedData['slug'] . '-' . time() . '5.' . $request->image5->extension();
            $path5 = $request->file('image5')->storeAs('product_images', $image5, 'public');
            $validatedData['image5'] = "/storage/{$path5}";
        } else {
            unset($request->image5);
        }

        $product->update($validatedData);
        $request->session()->flash('success', 'Produk berhasil diubah');

        // if ($request->has('sell_add')) {
        //     return back();
        // }

        return redirect('/seller/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
