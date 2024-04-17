<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductData extends Component
{
    public $limitPerpage = 10;
    public $search;
    public $category;
    protected $listeners = [
        'product-data' => 'productData'
    ];
    protected $queryString = [
        'search' => ['except' => ''],
        'category'  => ['except' => '']
    ];

    public function productData()
    {
        $this->limitPerpage = $this->limitPerpage + 5;
    }

    public function render()
    {
        $product = Product::latest()->when($this->search, function ($builder) {
            $builder->where('title', 'like', '%' . $this->search . '%');
        })->when($this->category, function ($builder) {
            $builder->whereHas('product_sub_category', function ($query) {
                $query->where('slug', $this->category);
            });
        })->withCount([
            'ratingSum as avg_rate' => function ($query) {
                $query->select(DB::raw('AVG(nilai)'));
            },

            'ratingSum as total_rate' => function ($query) {
                $query->select(DB::raw('COUNT(id)'));
            }
        ])->paginate($this->limitPerpage);

        // $product;
        // dd($product);
        $this->emit('productData');
        $this->dispatchBrowserEvent('loading-complete');

        return view('livewire.product-data', compact('product'));
    }
}
