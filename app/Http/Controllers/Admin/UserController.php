<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'title' => 'Daftar Pengguna'
        ]);
    }

    public function customer(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereHas('roles', function ($query) {
                return $query->where('name', 'customer');
            });

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('selection', function ($row) {
                    return '<div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>';
                })
                ->addColumn('imageRaw', function ($row) {
                    return '<img src="' . asset('storage/user_images/' . $row->image) . '" alt="" class="rounded-circle avatar-sm">';
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
                ->rawColumns(['action', 'selection', 'imageRaw'])
                ->make(true);
        }
    }

    public function seller(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('store')->whereHas('roles', function ($query) {
                return $query->where('name', 'seller');
            });

            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('selection', function ($row) {
                    return '<div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>';
                })
                ->addColumn('imageRaw', function ($row) {
                    return '<img src="' . asset('storage/user_images/' . $row->image) . '" alt="" class="rounded-circle avatar-sm">';
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
                ->rawColumns(['action', 'selection', 'imageRaw'])
                ->make(true);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        try {
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'User deleted failed');
        }
    }
}
