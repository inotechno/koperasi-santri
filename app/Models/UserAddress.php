<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    protected $fillable = ['name', 'subdistrict_id', 'phone', 'address_line1', 'address_line2', 'primary_address', 'store_address', 'return_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }

    public function address_to()
    {
        return $this->hasOne(DeliveryDetail::class, 'id', 'address_to');
    }

    public function address_from()
    {
        return $this->hasOne(DeliveryDetail::class, 'id', 'address_from');
    }
}
