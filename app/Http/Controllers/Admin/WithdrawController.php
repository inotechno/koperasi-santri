<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HistoryWithdraw;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class WithdrawController extends Controller
{
    public function index()
    {
        return view('admin.withdraws.index', [
            'title' => 'Daftar Withdraw'
        ]);
    }

    public function history(Request $request)
    {
        if ($request->ajax()) {
            $data = HistoryWithdraw::with('user');

            if (!empty($request->status)) {
                $data = $data->where('status', $request->status);
            }

            if (!empty($request->user_id)) {
                $data = $data->where('user_id', $request->user_id);
            }

            if (!empty($request->date)) {
                $data = $data->whereDate('created_at', '=', $request->date);
            }

            $data->get();
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('imageRaw', function ($row) {
                //     return '<img src="' . asset('storage/user_images/' . $row->image) . '" alt="" class="rounded-circle avatar-sm">';
                // })
                ->addColumn('status', function (HistoryWithdraw $history) {
                    if ($history->status_code === null) {
                        return 'Sedang Diajukan';
                    }

                    $status = $this->check_status($history->reference_number);
                    if ($status['statusCode'] == 200) {
                        return $status['responseCode'] . ' (' . $status['responseDesc'] . ')';
                    }
                })

                ->rawColumns(['status'])
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
                                        <li><a href="" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a href="" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>';
                })
                ->rawColumns(['action', 'selection', 'imageRaw'])
                ->make(true);
        }
    }

    public function check_status($id)
    {
        $disburseId     = $id;
        $userId = env('DUITKU_USERID_DIS');
        $secretKey = env('DUITKU_SECRET_KEY');
        $email = env('DUITKU_EMAIL');

        $timestamp      = round(microtime(true) * 1000);
        $paramSignature = $email . $timestamp . $disburseId . $secretKey;

        $signature      = hash('sha256', $paramSignature);

        $params = array(
            'disburseId' => $disburseId,
            'userId'     => $userId,
            'email'      => $email,
            'timestamp'  => $timestamp,
            'signature'  => $signature
        );

        $params_string = json_encode($params);
        $url = 'https://sandbox.duitku.com/webapi/api/disbursement/inquirystatus'; // Sandbox
        // $url = 'https://passport.duitku.com/webapi/api/disbursement/inquirystatus'; // Production
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params_string)
            )
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode == 200) {
            $result = json_decode($request, true);
            $result['statusCode'] = $httpCode;
            return $result;
        } else {
            $return['statusCode'] = $httpCode;
            return $return;
        }
    }
}
