<?php

namespace App\Models;

use App\Models\Store;
use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product_sub_category()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Get all of the rating for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function rating_list()
    {
        return $this->belongsTo(Rating::class);
    }

    public function ratingSum()
    {
        return $this->hasMany(Rating::class)
            // ->selectRaw('ratings.product_id,SUM(ratings.nilai) as total_rating')
            ->groupBy('ratings.product_id');
    }

    public function visit()
    {
        return $this->hasMany(ProductVisits::class);
    }
}
