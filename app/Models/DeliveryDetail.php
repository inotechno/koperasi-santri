<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;

    protected $fillable = ['address_to', 'address_from', 'expedition', 'expedition_service', 'total_weight', 'shipping_cost'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function to()
    {
        return $this->belongsTo(UserAddress::class, 'address_to', 'id');
    }

    public function from()
    {
        return $this->belongsTo(UserAddress::class, 'address_from', 'id');
    }
}
