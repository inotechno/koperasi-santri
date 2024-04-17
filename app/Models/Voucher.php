<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'desc', 'desc_excerpt', 'type_id', 'uses', 'max_uses', 'max_uses_user', 'discount_nominal', 'discount_percentage', 'minimum_order', 'max_discount', 'start_at', 'expired_at'];

    public function type()
    {
        return $this->belongsTo(VoucherType::class, 'type_id');
    }

    /**
     * The user that belong to the Voucher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'vouchers_users');
    }

    /**
     * Get the order that owns the Voucher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
