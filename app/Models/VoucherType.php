<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * Get all of the voucher for the VoucherType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voucher()
    {
        return $this->hasMany(Voucher::class, 'type_id');
    }
}
