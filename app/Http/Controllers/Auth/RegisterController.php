<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('register', [
            'title' => 'Register',
        ]);
    }

    public function seller()
    {
        return view('register-seller', [
            'title' => 'Daftar Menjadi Penjual'
        ]);
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
        $validatedData = $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users|email:dns',
            'username'  => 'required|unique:users|min:3|max:255|alpha_dash',
            'password'  => 'required|min:5|max:255|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);
        $user->assignRole('customer');

        event(new Registered($user));

        $request->session()->flash('success', 'Registrasi Sukses, Silahkan Verifikasi Email');
        return redirect('/login');
    }

    public function store_seller(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required',
            'store_name' => 'required|unique:stores,name',
            'email'     => 'required|unique:users|email:dns',
            'username'  => 'required|unique:users|min:3|max:255|alpha_dash',
            'password'  => 'required|min:5|max:255|confirmed',
        ]);

        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['username'] = $request->username;
        $user['password'] = bcrypt($validatedData['password']);

        $userCreate = User::create($user);
        $userCreate->assignRole('seller');

        $store['user_id'] = $userCreate->id;
        $store['name'] = $request->store_name;
        $store['slug'] = Str::slug($store['name']);

        $storeCreate = Store::create($store);

        event(new Registered($userCreate));

        $request->session()->flash('success', 'Registrasi Sukses, Silahkan Verifikasi Email');
        return redirect('/login');
    }

    public function register_seller(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users|email:dns',
            'username'  => 'required|unique:users|min:3|max:255|alpha_dash',
            'password'  => 'required|min:5|max:255|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registrasi Sukses, Silahkan Login');
        return redirect('/login');
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
