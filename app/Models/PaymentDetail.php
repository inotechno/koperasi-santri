<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = ['payment_code', 'payment_name', 'va_number', 'payment_url', 'qr_string', 'status_code', 'expiration_date', 'paid_date', 'fee'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
