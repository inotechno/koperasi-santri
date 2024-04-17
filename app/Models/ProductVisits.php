<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVisits extends Model
{
    use HasFactory;

    protected $fillable  = ['product_id', 'user_agent', 'device', 'platform', 'browser', 'ip', 'user_id'];

    /**
     * Get the product that owns the ProductVisits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that owns the ProductVisits
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
