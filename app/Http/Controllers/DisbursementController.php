<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\HistoryWithdraw;
use Illuminate\Support\Facades\Auth;

class DisbursementController extends Controller
{
    private $userId;
    private $secretKey;
    private $amount;
    private $bankAccount;
    private $bankCode;
    private $email;
    private $purpose;
    private $timestamp;
    private $senderId;
    private $senderName;
    private $signature;
    private $disburseId;
    private $accountName;
    private $custRefNumber;

    // public function withdraw()
    // {
    //     try {
    //         $inquiry = $inquiry();
    //         // dd($inquiry);
    //         if ($inquiry['statusCode'] === 200) {
    //             $accountName = $inquiry['accountName'];
    //             $disburseId = $inquiry['disburseId'];
    //             $custRefNumber = $inquiry['custRefNumber'];

    //             $transfer = $transfer();
    //             if ($transfer['statusCode'] === 200) {
    //                 return response()->json($transfer);
    //             }
    //         }
    //     } catch (\Throwable $th) {
    //         return $th->getMessage();
    //     }
    // }

    public function inquiry(Request $request)
    {
        $user = User::find(Auth::id());

        if ($request->nominal > $user->store->saldo) {
            $result['responseCode'] = 300;
            $result['responseDesc'] = 'Nominal tidak boleh melebihi saldo';
            return response()->json($result);
        } else if ($request->nominal <= 0) {
            $result['responseCode'] = 300;
            $result['responseDesc'] = 'Nominal tidak bisa kurang dari 0';
            return response()->json($result);
        }

        $refer = 'WD' . date('YmdHis');
        $userId = env('DUITKU_USERID_DIS');
        $secretKey = env('DUITKU_SECRET_KEY');
        $email = env('DUITKU_EMAIL');
        // $bankAccount    = '8760673566';
        // $bankCode       = '014';
        $bankAccount      = $request->rekening;
        $bankCode         = $request->bank_code;

        $amount           = $request->nominal;
        $purpose          = 'Test Disbursement ' . $refer;
        $senderId         = 3551;
        $senderName       = 'Koperasi Santri';

        $timestamp        = round(microtime(true) * 1000);
        $paramSignature = $email . $timestamp . $bankCode  . $bankAccount . $amount . $purpose . $secretKey;
        // $paramSignature = $email . $timestamp . $bankCode . $bankAccount . $amount . $purpose . $secretKey;
        $signature = hash('sha256', $paramSignature);

        $params = array(
            'userId'         => $userId,
            'amountTransfer' => $amount,
            'bankAccount'    => $bankAccount,
            'bankCode'       => $bankCode,
            'email'          => $email,
            'purpose'        => $purpose,
            'timestamp'      => $timestamp,
            'senderId'       => $senderId,
            'senderName'     => $senderName,
            'signature'      => $signature
        );

        // dd($userId);
        $params_string = json_encode($params);
        $url = 'https://sandbox.duitku.com/webapi/api/disbursement/inquirysandbox'; // Sandbox
        // $url = 'https://passport.duitku.com/webapi/api/disbursement/inquiry'; // Production

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

        // dd($request);
        if ($httpCode == 200) {
            $result = json_decode($request, true);
            $result['statusCode'] = $httpCode;
            $result['request'] = 'inquiry';
            return response()->json($result);
        } else {
            $return['statusCode'] = $httpCode;
            return response()->json($return);
        }
    }

    public function transfer(Request $request)
    {
        // dd($request);
        $user = User::find(Auth::id());

        if ($request->nominal > $user->store->saldo) {
            $result['responseCode'] = 300;
            $result['responseDesc'] = 'Nominal tidak boleh melebihi saldo';
            return response()->json($result);
        } else if ($request->nominal <= 0) {
            $result['responseCode'] = 300;
            $result['responseDesc'] = 'Nominal tidak bisa kurang dari 0';
            return response()->json($result);
        }

        $refer = 'WD' . date('YmdHis');
        $userId = env('DUITKU_USERID_DIS');
        $secretKey = env('DUITKU_SECRET_KEY');
        $email = env('DUITKU_EMAIL');
        // $bankAccount    = '8760673566';
        // $bankCode       = '014';
        $bankAccount      = $request->rekening;
        $bankCode         = $request->bank_code;

        $amount           = $request->nominal;
        $purpose          = 'Test Disbursement ' . $refer;
        $senderId         = 3551;
        $senderName       = 'Koperasi Santri';

        $timestamp      = round(microtime(true) * 1000);
        // $paramSignature = $email . $timestamp . $bankCode . $bankAccount . $request->accountName . $request->custRefNumber . $amount . $purpose . $request->disburseId . $secretKey;
        $paramSignature = $email . $timestamp . $bankCode  . $bankAccount . $request->accountName . $request->custRefNumber . $amount . $purpose . $request->disburseId . $secretKey;
        $signature = hash('sha256', $paramSignature);

        $params = array(
            'disburseId'     => $request->disburseId,
            'userId'         => $userId,
            'email'          => $email,
            'bankCode'       => $bankCode,
            'bankAccount'    => $bankAccount,
            'amountTransfer' => $amount,
            'accountName'    => $request->accountName,
            'custRefNumber'  => $request->custRefNumber,
            'purpose'        => $purpose,
            'timestamp'      => $timestamp,
            'signature'      => $signature
        );

        $params_string = json_encode($params);
        $url = 'https://sandbox.duitku.com/webapi/api/disbursement/transfersandbox'; // Sandbox
        // $url = 'https://passport.duitku.com/webapi/api/disbursement/transfer'; // Production
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
        $_request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        try {
            $result = json_decode($_request, true);

            HistoryWithdraw::create([
                'reference_number'  => $request->disburseId,
                'user_id'           => $user->id,
                'nominal'           => $request->nominal,
                'status_code'       => $result['responseCode'],
                'status_description'    => $result['responseDesc']
            ]);

            \Balance::insert($user->store->id, $request->nominal, 'credit', 'Pencairan dana #' . $request->disburseId);
            $request->session()->flash('success', 'Pengajuan pencairan dana berhasil, Silahkan cek mutasi secara berkala maksimal 2 hari kerja.');

            return redirect()->route('seller.balance');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th);
            return back();
        }
    }
}
