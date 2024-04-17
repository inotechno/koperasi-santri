<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'name' => 'required|max:255',
            'subdistrict_id' => 'required|numeric',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address_line1' => 'required|max:255',
            'address_line2' => 'max:255',
        ]);

        try {
            $data = new UserAddress();
            // dd(auth()->user()->id);
            $data->name = $request->name;
            $data->subdistrict_id = $request->subdistrict_id;
            $data->phone = $request->phone;
            $data->address_line1 = $request->address_line1;
            $data->address_line2 = $request->address_line2;
            $data->primary_address = $request->primary_address;
            $data->return_address = $request->return_address;
            $data->store_address = $request->store_address;
            $data->user_id = auth()->user()->id;

            if ($request->store_address == 'on') {
                UserAddress::where('user_id', $data->user_id)->update(['store_address' => null]);
            }

            if ($request->primary_address == 'on') {
                UserAddress::where('user_id', $data->user_id)->update(['primary_address' => null]);
            }
            // dd($data);
            $data->save();
            $request->session()->flash('success', 'Alamat berhasil ditambahkan');
            return response()->json($data);
        } catch (\Exception $e) {
            $request->session()->flash('success', $e->getMessage());
            return response()->json($e->getMessage());
        }
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = UserAddress::with('subdistrict')->findOrFail($id);
        $address->subdistrict->city;
        $address->subdistrict->city->province;
        return response()->json($address);
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
        if ($request->store_address == 'on') {
            UserAddress::where('user_id', auth()->user()->id)->update(['store_address' => null]);
        }

        if ($request->primary_address == 'on') {
            UserAddress::where('user_id', auth()->user()->id)->update(['primary_address' => null]);
        }

        $address = UserAddress::findOrFail($id);
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'subdistrict_id' => 'required|numeric',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address_line1' => 'required|max:255',
            'address_line2' => 'max:255',
        ]);

        try {
            $validatedData['primary_address'] = $request->primary_address;
            $validatedData['return_address'] = $request->return_address;
            $validatedData['store_address'] = $request->store_address;
            $validatedData['user_id'] = auth()->user()->id;

            $address->update($validatedData);
            $request->session()->flash('success', 'Alamat berhasil diubah');
            return response()->json($address);
        } catch (\Exception $e) {
            $request->session()->flash('success', $e->getMessage());
            return response()->json($e->getMessage());
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
        $address = UserAddress::findOrFail($id);
        // dd(Auth::user()->hasRole('seller'));
        try {
            if (Auth::user()->hasRole('customer')) {
                if ($address->primary_address == 'on') {
                    request()->session()->flash('error', 'Alamat utama tidak bisa dihapus');
                }

                $address->delete();
                request()->session()->flash('success', 'Alamat berhasil dihapus');
            } elseif (Auth::user()->hasRole('seller')) {
                if ($address->store_address == 'on') {
                    request()->session()->flash('error', 'Alamat toko tidak bisa dihapus');
                }

                $address->delete();
                request()->session()->flash('success', 'Alamat berhasil dihapus');
            } else {
                $address->delete();
                request()->session()->flash('success', 'Alamat berhasil dihapus');
            }

            return response()->json($address);
        } catch (\Exception $e) {
            request()->session()->flash('success', $e->getMessage());
            return response()->json($e->getMessage());
        }
    }
}
