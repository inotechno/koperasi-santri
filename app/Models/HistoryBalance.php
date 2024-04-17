<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBalance extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'saldo_awal', 'nominal', 'saldo_akhir', 'debit_or_credit', 'keterangan'];

    /**
     * Get the store that owns the HistoryBalance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
