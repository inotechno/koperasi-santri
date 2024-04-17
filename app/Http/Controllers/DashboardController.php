<?php

namespace App\Http\Controllers;

use App\Helpers\ProductVisit;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Message;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVisits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $store_id = Auth::user()->store->id;
        $user_id = Auth::user()->id;
        // $order = Order::with('store.user')->where('store_id', auth()->user()->store->id)->count()

        return view('dashboard', [
            $user = Auth::user()->id,
            'title' => 'Dashboard',
            'order_item' => $order_item = OrderItem::all(),
            'product' => Product::where('store_id', $store_id)->count(),
            'order' => Order::where('store_id', $store_id)->count(),
            'chat'  => Message::where('from', $user_id)->count(),
            'rating' => Rating::where('store_id', $store_id)->take(10)->get()->count(),
            'best_selling_products' =>  Product::with('product_sub_category')->where('store_id', $store_id)->withSum('orderitem as total', 'quantity')->orderBy('total', 'desc')->take(6)->get(),
            'selingg_product' => Order::where('store_id', $store_id)->count(),
        ]);
    }

    public function admin()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'order_item' => $order_item = OrderItem::all(),
            'product' => Product::all()->count(),
            'order' => Order::all()->count(),
            'chat'  => Message::all()->count(),
            'rating' => Rating::all()->count(),
            'best_selling_products' =>  Product::with('product_sub_category')->withSum('orderitem as total', 'quantity')->orderBy('total', 'desc')->take(6)->get(),
            'selingg_product' => Order::count(),
        ]);
    }

    public function getChart(Request $request)
    {
        $data = [];
        $store_id = Auth::user()->store->id;

        if ($request->filter == '7D') {
            $potensi_penjualan = Order::where('store_id', $store_id)->whereDate('created_at', Carbon::now()->subDays(7))->get();
            $produk_dilihat = ProductVisits::whereHas('product', function ($q) use ($store_id) {
                $q->where('store_id', $store_id);
            })->whereDate('created_at', Carbon::now()->subDays(7))->get();
            $produk_sale = Product::where('store_id', $store_id)->whereDate('created_at', Carbon::now()->subDays(7))->get();
        }
    }
}
