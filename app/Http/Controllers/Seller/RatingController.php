<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Rating;
use App\Models\Product;

class RatingController extends Controller
{
    public function index()
    {
        return view('seller.rating.index', [
            'title' => 'Daftar Penilaian'
        ]);
    }

    public function rating_list(Request $request)
    {
        if ($request->ajax()) {
            // $store = Store::where('user_id', auth()->user()->id)->first();

            $rating = Rating::with('product_list')->with('order_list')->with('order_list.user')
                ->whereHas('product_list.store', function ($query) {
                    return $query->where('store_id', auth()->user()->load('store')->store->id);
                });

            // dd($rating);
            return DataTables::eloquent($rating)
                ->addIndexColumn()
                ->addColumn('product_image', function (Rating $rating) {
                    return '<img class="avatar-sm" src="' . asset('thumbnail/product_images/' . $rating->product_list[0]->image1) . '">';
                    // return $rating->product_list[0]->title;
                })
                ->addColumn('product_name', function (Rating $rating) {
                    return $rating->product_list[0]->title;
                })
                ->addColumn('customer_name', function (Rating $rating) {
                    return $rating->order_list[0]->user->name;
                })
                ->rawColumns(['product_image'])
                ->make(true);
        }
    }
}
