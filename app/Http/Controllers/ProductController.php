<?php

namespace App\Http\Controllers;

use App\Helpers\ProductVisit;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Voucher;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Fstarkcyber\RajaOngkir\Facades\RajaOngkir;

class ProductController extends Controller
{
    public function index()
    {
        // $daftarKota = RajaOngkir::kota()->all();
        // dd($daftarKota);

        return view('products.explore', [
            'title' => 'Explore Products',
        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('rating.order.user')->withCount([
            'ratingSum as avg_rate' => function ($query) {
                $query->select(DB::raw('AVG(nilai)'));
            },

            'ratingSum as total_rate' => function ($query) {
                $query->select(DB::raw('COUNT(id)'));
            }
        ])->withCount([
            'rating as rate_5' => function ($query) {
                $query->where('nilai', 'LIKE', "5%");
            },

            'rating as rate_4' => function ($query) {
                $query->where('nilai', 'LIKE', "4%");
            },

            'rating as rate_3' => function ($query) {
                $query->where('nilai', 'LIKE', "3%");
            },

            'rating as rate_2' => function ($query) {
                $query->where('nilai', 'LIKE', "2%");
            },

            'rating as rate_1' => function ($query) {
                $query->where('nilai', 'LIKE', "1%");
            },
        ])->first();

        ProductVisit::insert($product->id, Auth::id());
        // dd($product);
        $product->tanggal_publish = $product->created_at->isoFormat('dddd, D MMMM Y');
        return view('products.detail', [
            'title' => $product->title,
            'product' => $product,
        ]);
    }

    public function cart()
    {
        $cart = Cart::where('user_id', Auth::id())->where('checkout_at', NULL)->get()->sortBy(function ($query) {
            return $query->product->store_id;
        });

        $vouchers = Voucher::where('start_at', '<=', date('Y-m-d H:i:s'))->where('expired_at', '>=', date('Y-m-d H:i:s'))->get();
        // dd($vouchers);
        return view('cart.index', [
            'title' => 'Keranjang',
            'cart' => $cart,
            'vouchers' => $vouchers
        ]);
    }

    public function cart_add(Request $request)
    {
        if (empty($request->product_id)) {
            $request->session()->flash('error', 'Pilih produk terlebih dahulu !');
        }

        if (!Auth::check()) {
            $request->session()->flash('error', 'Silahkan login terlebih dahulu !');
        } else {
            $validate = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->where('checkout_at', NULL)
                ->first();

            // dd($validate);
            if ($validate != null) {
                $upd = (int) $validate->quantity + $request->quantity;
                $validate->update(['quantity', $upd]);
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'quantity' => 1,
                ]);
            }

            $request->session()->flash('success', 'Produk berhasil masuk keranjang');
        }

        return back();
    }


    public function category()
    {
        $category = ProductCategory::all()->load('product_sub_category');
        return json_encode($category);
    }
}
