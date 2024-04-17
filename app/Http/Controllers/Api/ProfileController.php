<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\RekeningResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserAddressResource;


class ProfileController extends BaseController
{
    public function updateProfil(Request $request, $id)
    {
        $user = User::find($id);

        // dd($user);
        $validatedData = $request->validate([
            'name'      => 'required',
            'phone'     => 'required',
            // 'email'     => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        try {
            $user->update($validatedData);
            return $this->sendResponse(new ProfileResource($user), 'Profile updated successfully');
        } catch (\Exception $th) {
            return $this->sendError('Failed', ['error' => $th->getMessage()]);
        }
    }

    public function update_password(Request $request, $id)
    {
        $user = User::find($id);
        $validatedData = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'confirmed|max:8|different:old_password',
        ]);


        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
        }

        $data['password']  = $request->password;

        try {

            $user->update($data);

            return $this->sendResponse(new ProfileResource($user), 'Password Change successfully');
        } catch (\Exception $th) {
            return $this->sendError('Failed', ['error' => $th->getMessage()]);
        }
    }

<<<<<<< HEAD
    public function updateRekening(Request $request, $id)
    {
        $user = User::find($id);
=======
    public function addresses(Request $request)
    {
        // $address = UserAddress::all();
        $address = UserAddress::where('user_id', $request->user_id)->with('subdistrict', 'subdistrict.city', 'subdistrict.city.province')->get();
        // return response()->json($address);
        // dd(UserAddressResource::collection($address));
        return $this->sendResponse(UserAddressResource::collection($address), 'User addresses retrieved successfully');
    }

    // public function updateRekening(Request $request, $id)
    // {
    //     $user = User::find($id);
>>>>>>> 3c1e3f2a5d6bb389c1a42549e47cefa6a11a3389

        // dd($user);
        $validatedData = $request->validate([
            'bank_name'      => 'required',
            'rekening'     => 'required|numeric',
            'rekening_atas_nama' => 'string|required',
        ]);

        try {
            $user->update($validatedData);
            return $this->sendResponse(new RekeningResource($user), 'Rekening updated successfully');
        } catch (\Exception $th) {
            return $this->sendError('Failed', ['error' => $th->getMessage()]);
        }
    }
}
