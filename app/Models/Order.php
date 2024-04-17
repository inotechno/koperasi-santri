<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'reference_number',
        'store_id',
        'user_id',
        'ppn',
        'disc',
        'grand_total',
        'payment_detail_id',
        'voucher_id',
        'delivery_detail_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function paymentdetail()
    {
        return $this->belongsTo(PaymentDetail::class, 'payment_detail_id', 'id');
    }

    public function deliverydetail()
    {
        return $this->belongsTo(DeliveryDetail::class, 'delivery_detail_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
