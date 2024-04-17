<?php

namespace App\Http\Controllers\Seller;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Charts\StatisticChart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function statistik()
    {
        return view('seller.statistic.index',[
            'title' => 'Daftar Manajement Pelanggan',
            'orderItem' => OrderItem::all(),
            $maleCount = User::where('jenis_kelamin', 'L')->count(),
            $femaleCount = User::where('jenis_kelamin', 'P')->count(),
           'chartData' =>  [
                'Laki-laki' => $maleCount,
                'Perempuan' => $femaleCount,
           ],
        ]);
    }
}