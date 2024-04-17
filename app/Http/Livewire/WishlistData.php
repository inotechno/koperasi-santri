<?php

namespace App\Http\Livewire;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WishlistData extends Component
{
    public $limitPerpage = 10;
    protected $listeners = [
        'wishlist-data' => 'wishlistData'
    ];

    public function wishlistData()
    {
        $this->limitPerpage = $this->limitPerpage + 5;
    }

    public function render()
    {
        // $product = Product::latest()->withCount([
        //     'ratingSum as avg_rate' => function ($query) {
        //         $query->select(DB::raw('AVG(nilai)'));
        //     },

        //     'ratingSum as total_rate' => function ($query) {
        //         $query->select(DB::raw('COUNT(id)'));
        //     }
        // ])->paginate($this->limitPerpage);

        $wishlist = Wishlist::with(['product' => function ($q) {
            $q->withCount([
                'ratingSum as avg_rate' => function ($query) {
                    return $query->select(DB::raw('AVG(nilai)'));
                },

                'ratingSum as total_rate' => function ($query) {
                    return $query->select(DB::raw('COUNT(id)'));
                }
            ]);
        }])->where('user_id', Auth::id())->latest()->paginate($this->limitPerpage);

        // dd($wishlist);

        $this->emit('wishlistData');
        $this->dispatchBrowserEvent('loading-complete');

        return view('livewire.wishlist-data', compact('wishlist'));
    }
}
