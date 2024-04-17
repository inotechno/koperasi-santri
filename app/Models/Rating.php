<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id','store_id', 'nilai', 'catatan', 'created_at', 'updated_at'];

    /**
     * Get the order that owns the Rating
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product that owns the Rating
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_list()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    public function order_list()
    {
        return $this->hasMany(Order::class, 'id', 'order_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
