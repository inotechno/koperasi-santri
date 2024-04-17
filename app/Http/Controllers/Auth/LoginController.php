<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function authenticated(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::attempt([$fieldType => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            $request->session()->flash('success', 'Login berhasil, Welcome to dashboard');

            if (auth()->user()->hasRole('seller')) {
                return redirect()->route('seller.dashboard');
            }

            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->intended();
        }

        $request->session()->flash('error', 'Login gagal, silahkan coba kembali');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
