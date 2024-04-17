<?php

namespace App\Http\Controllers\Admin;

use App\Models\Voucher;
use App\Models\VoucherType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.voucher.index', [
            'title' => 'Daftar Voucher',
            'types' => VoucherType::all()
        ]);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Voucher::with('type');

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->order(function ($query) {
                    $query->orderBy('created_at', 'desc');
                })
                ->addColumn('discount', function ($row) {
                    if ($row->discount_nominal != null) {
                        return $row->discount_nominal;
                    }

                    return $row->discount_percentage . '%, Max: ' . $row->max_discount;
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <button class="btn btn-delete" data-id="' . $row->id . '">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'discount'])
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
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:vouchers,code',
            'name' => 'required',
            'discount_nominal' => 'required_if:discount_type,nominal',
            'discount_percentage' => 'required_if:discount_type,percentage',
            'max_discount' => 'required_if:discount_type,percentage',
            'type_id' => 'required',
            'max_uses' => 'nullable',
            'max_uses_user' => 'nullable',
            'minimum_order' => 'nullable',
            'desc_excerpt' => 'required',
            'desc' => 'nullable',
            'start_at' => 'required|before:expired_at',
            'expired_at' => 'required|after:start_at'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 201);
        }

        $validator->validate();

        Voucher::create($request->all());
        return response()->json(['success' => true, 'data' => $request->all()], 200);
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
        //
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
        //
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
