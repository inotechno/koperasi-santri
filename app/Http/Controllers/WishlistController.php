<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        // dd($product->getOptions());
        return view('wishlist', [
            'title' => 'Wishlist Products',
        ]);
    }

    public function store(Request $request)
    {
        if (empty($request->product_id)) {
            $request->session()->flash('error', 'Pilih produk terlebih dahulu !');
        }

        if (!Auth::check()) {
            $request->session()->flash('error', 'Silahkan login terlebih dahulu !');
        } else {
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
            ]);

            $request->session()->flash('success', 'Produk berhasil disimpan');
        }

        return back();
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();

        return back()->with('success', 'Produk berhasil dihapus dari wishlist');
    }
}
