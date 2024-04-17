<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
