<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    public function index()
    {
        return view('helpcare.index');
    }

    public function akun()
    {
        return view('helpcare.akun.cara_daftar');
    }
}
