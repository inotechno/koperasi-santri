<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $user = User::with(['store', 'useraddress'])->find(Auth::id());
        $banks = $this->list_banks();

        if ($banks['responseCode'] == 00) {
            $banks['Banks'] = $banks['Banks'];
        } else {
            $banks['Banks'] = [];
        }
        // dd($banks);
        return view('setting', [
            'title' => 'Pengaturan',
            'user' => $user,
            'banks' => $banks['Banks']
        ]);
    }

    public function updateProfil(Request $request, $id)
    {
        $user = User::find($id);

        // dd($user);
        $validatedData = $request->validate([
            'name'      => 'required',
            'phone'     => 'numeric',
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'string'
        ]);

        try {
            $user->update($validatedData);
            $request->session()->flash('success', 'Profil berhasil diubah');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th);
            //throw $th;
        }

        return back();
    }

    public function updateRekening(Request $request, $id)
    {
        $user = User::find($id);

        // dd($user);
        $validatedData = $request->validate([
            'bank_code'      => 'required',
            'bank_name'      => 'required',
            'rekening'     => 'required|numeric',
            'rekening_atas_nama' => 'string|required',
        ]);

        try {
            $user->update($validatedData);
            $request->session()->flash('success', 'Rekening berhasil diubah');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th);
            //throw $th;
        }

        return back();
    }

    public function changeImage(Request $request, $id)
    {
        // dd($request);
        $user = User::find($id);
        // dd($user);
        if ($request->file('image')) {

            $image = $request->file('image');
            $data['image'] = $user->username . '-' . time() . '.' . $image->extension();

            $path1 = $request->file('image')->storeAs('user_images', $data['image'], 'public');

            // dd($request->image_lama);
            // dd(Storage::disk('public')->exists('user_images/' . $request->image_lama));
            if (Storage::disk('public')->exists('user_images/' . $request->image_lama)) {
                Storage::disk('public')->delete('user_images/' . $request->image_lama);
            }
        }

        try {
            $user->update($data);
            $request->session()->flash('success', 'Image berhasil diubah');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th);
            //throw $th;
        }

        return back();
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);

        // dd($request->validate());
        $validatedData = Validator::make($request->all(), [
            'password_lama'  => 'required|min:5|max:255',
            'password'  => 'required|min:5|max:255|confirmed',
        ]);

        // dd(Hash::check($request->password_lama, $user->password));
        if ($validatedData->fails()) {
            return back()
                ->withErrors($validatedData)
                ->withInput();
        }

        try {
            if (!Hash::check($request->password_lama, $user->password)) {
                $request->session()->flash('error', 'Password lama tidak sesuai, silahkan ingat kembali !');
            }

            $user->password = bcrypt($request->password);
            $user->save();

            $request->session()->flash('success', 'Password berhasil diubah');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th);
            //throw $th;
        }

        return back();
    }

    public function changeLogo(Request $request, $id)
    {
        // dd($request);
        $store = Store::find($id);
        // dd($store);
        if ($request->file('logo')) {

            $logo = $request->file('logo');
            $data['logo'] = $store->slug . '-' . time() . '.' . $logo->extension();

            $path1 = $request->file('logo')->storeAs('logo_images', $data['logo'], 'public');

            // dd($request->logo_lama);
            // dd(Storage::disk('public')->exists('logo_images/' . $request->logo_lama));
            if (Storage::disk('public')->exists('logo_images/' . $request->logo_lama)) {
                Storage::disk('public')->delete('logo_images/' . $request->logo_lama);
            }
        }

        try {
            $store->update($data);
            $request->session()->flash('success', 'Logo berhasil diubah');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th);
            //throw $th;
        }

        return back();
    }

    public function updateStore(Request $request, $id)
    {
        $store = Store::find($id);

        // dd($store);
        $validatedData = $request->validate([
            'description'      => 'required',
        ]);

        try {
            $store->update($validatedData);
            $request->session()->flash('success', 'Deskripsi toko berhasil diubah');
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th);
            //throw $th;
        }

        return back();
    }

    public function list_banks()
    {
        $email          = env('DUITKU_EMAIL');
        $secretKey      = env('DUITKU_SECRET_KEY');
        $userId         = env('DUITKU_USERID_DIS');
        $timestamp      = round(microtime(true) * 1000);
        $paramSignature = $email . $timestamp . $secretKey;

        $signature      = hash('sha256', $paramSignature);

        $params = array(
            'userId'    => $userId,
            'email'     => $email,
            'timestamp' => $timestamp,
            'signature' => $signature
        );

        $params_string = json_encode($params);
        if (env('DUITKU_ENV') == 'dev') {
            $url = 'https://sandbox.duitku.com/webapi/api/disbursement/listBank'; // Sandbox
        } else {
            $url = 'https://passport.duitku.com/webapi/api/disbursement/listBank'; // Production
        }
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

            return $result;
        } else {
            $return['statusCode'] = $httpCode;
            return $return;
        }
    }
}
