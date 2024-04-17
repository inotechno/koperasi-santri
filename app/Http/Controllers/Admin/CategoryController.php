<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', [
            'title' => 'Daftar Kategori',
            'product_category' => ProductCategory::all()
        ]);
    }

    public function category(Request $request)
    {
        if ($request->ajax()) {
            $product_category = ProductCategory::query();
            return DataTables::eloquent($product_category)
                ->addIndexColumn()
                ->addColumn('selection', function ($row) {
                    return '<div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>';
                })
                ->addColumn('addsubcat', function ($row) {
                    return '<div class="input-group input-group-sm">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addsub">Add
                            </div>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button type="button" data-id=' . $row->id . ' data-jenis="edit" class="btn action">
                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn btn-delete" data-id="' . $row->id . '">
                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'addsubcat'])
                ->make(true);
        }
    }
    // <button type="button" data-id=' . $row->id . ' data-jenis="edit" class="btn btn-warning btn-sm action">
    //                             <i class="icon-pencil-alt" ></i>
    //                         </button>

    public function sub_category(Request $request)
    {
        if ($request->ajax()) {
            $sub_category = ProductSubCategory::query();
            return DataTables::eloquent($sub_category)
                ->addIndexColumn()
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
                                        <li><a href="" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a href="" class="dropdown-item edit-item-btn modal-title" id="exampleModalLabel""><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection',])
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
        //
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
        $validator = $request->validate([
            'name'              => 'required',
            'icon'           => 'required',
        ]);

        $validator['slug'] = Str::slug($request->name, '-');

        try {
            ProductCategory::create($validator);
            return redirect()->route('admin.category')->with('success', 'Category added successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Category added failed');
        }
    }

    public function subcat(Request $request, $id)
    {
        $data = new ProductSubCategory();
        $data->name = $request->input('name');
        $data->product_category_id = $id;

        $data['slug'] = Str::slug($request->name, '-');

        try {
            $data->save();
            return redirect()->route('admin.category')->with('success', 'Sub category added successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Sub category added failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.edit', [
            'product_category' => ProductCategory::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_category = ProductCategory::find($id);

        $validator = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
        ]);

        try {
            $product_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
            ]);
            return redirect()->route('admin.category')->with('success', 'Category edit successfully');
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with('error', 'Category edit failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_category = ProductCategory::find($id);

        try {
            $product_category->delete();
            return redirect()->route('admin.category')->with('success', 'Category deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Category deleted failed');
        }
    }
}
