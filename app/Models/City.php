<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected  $guarded = [];

    protected $fillable = ['province_id', 'city_name', 'postal_code'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function subdistrict()
    {
        return $this->hasMany(Subdistrict::class);
    }
}
