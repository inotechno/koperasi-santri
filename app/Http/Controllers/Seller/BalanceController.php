<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\HistoryBalance;
use App\Models\HistoryWithdraw;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BalanceController extends Controller
{
    public function index()
    {
        $seller  = User::find(Auth::id());
        // dd($seller);
        return view('seller.balance.index', [
            'title' => 'History Saldo',
            'seller' => $seller
        ]);
    }

    public function balance(Request $request)
    {
        $store = Store::where('user_id', auth()->user()->id)->first();
        $data['saldo'] = number_format($store->saldo);
        if ($request->filter == null || $request->filter == "") {
            $data['debit'] = number_format(intval(HistoryBalance::where('store_id', $store->id)->where('debit_or_credit', 'debit')->sum('nominal')));
            $data['credit'] =  number_format(intval(HistoryBalance::where('store_id', $store->id)->where('debit_or_credit', 'credit')->sum('nominal')));
        }

        if ($request->filter == 'one_month') {
            $data['debit'] = number_format(intval(HistoryBalance::where('store_id', $store->id)->whereMonth('created_at', date('m'))->where('debit_or_credit', 'debit')->sum('nominal')));
            $data['credit'] =  number_format(intval(HistoryBalance::where('store_id', $store->id)->whereMonth('created_at', date('m'))->where('debit_or_credit', 'credit')->sum('nominal')));
        }

        if ($request->filter == 'one_year') {
            $data['debit'] = number_format(intval(HistoryBalance::where('store_id', $store->id)->whereYear('created_at', date('Y'))->where('debit_or_credit', 'debit')->sum('nominal')));
            $data['credit'] =  number_format(intval(HistoryBalance::where('store_id', $store->id)->whereYear('created_at', date('Y'))->where('debit_or_credit', 'credit')->sum('nominal')));
        }

        if ($request->filter == 'six_month') {
            $data['debit'] = number_format(intval(HistoryBalance::where('store_id', $store->id)->where('created_at', '>', Carbon::now()->subMonths(6))->where('debit_or_credit', 'debit')->sum('nominal')));
            $data['credit'] =  number_format(intval(HistoryBalance::where('store_id', $store->id)->where('created_at', '>', Carbon::now()->subMonths(6))->where('debit_or_credit', 'credit')->sum('nominal')));
        }

        return response()->json($data);
    }

    public function history(Request $request)
    {
        if ($request->ajax()) {
            // $store = Store::where('user_id', auth()->user()->id)->first();

            $history = HistoryBalance::where('store_id', auth()->user()->load('store')->store->id)->orderBy('id', 'asc');

            return DataTables::eloquent($history)
                ->addIndexColumn()
                ->addColumn('history', function (HistoryBalance $history) {
                    return $history->keterangan;
                })
                ->rawColumns(['action', 'history'])
                ->make(true);
        }
    }

    public function withdraw(Request $request)
    {
        $user = User::find(Auth::id());
        // dd($user);
        $validatedData = $request->validate([
            'rekening' => 'required|numeric',
            'bank_name' => 'required',
            'rekening_atas_nama' => 'required',
            'nominal' => 'required|numeric',
        ]);

        if ($request->nominal > $user->store->saldo) {
            return back()->with('error', 'Nominal tidak boleh melebihi saldo');
        } else if ($request->nominal <= 0) {
            return back()->with('error', 'Nominal tidak bisa kurang dari 0');
        } else {
            $refer = 'WD' . date('YmdHis');
            try {
                HistoryWithdraw::create([
                    'reference_number'  => $refer,
                    'user_id'           => $user->id,
                    'nominal'           => $request->nominal,
                ]);

                \Balance::insert($user->store->id, $request->nominal, 'credit', 'Pencairan dana #' . $refer);
                $request->session()->flash('success', 'Pengajuan pencairan dana berhasil, mohon untuk menunggu admin memvalidasi data !');
            } catch (\Throwable $th) {
                $request->session()->flash('error', $th);
            }
        }

        return back();
    }

    public function history_withdraw(Request $request)
    {
        if ($request->ajax()) {
            // $store = Store::where('user_id', auth()->user()->id)->first();

            $history = HistoryWithdraw::where('user_id', auth()->user()->id)->orderBy('id', 'asc');

            return DataTables::eloquent($history)
                ->addIndexColumn()
                ->addColumn('status', function (HistoryWithdraw $history) {
                    if ($history->status_code === null) {
                        return 'Sedang Diajukan';
                    }

                    $status = $this->check_status($history->reference_number);
                    if ($status['statusCode'] == 200) {
                        return $status['responseCode'] . ' (' . $status['responseDesc'] . ')';
                    }
                })
                ->rawColumns(['history'])
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
