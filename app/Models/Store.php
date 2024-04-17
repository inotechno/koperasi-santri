<?php

namespace App\Models;

use App\Models\User;
use App\Models\HistoryBalance;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'slug', 'logo', 'description', 'status'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function history_balance()
    {
        return $this->hasMany(HistoryBalance::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
