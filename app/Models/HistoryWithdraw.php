<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryWithdraw extends Model
{
    use HasFactory;

    protected $fillable = ['reference_number', 'user_id', 'nominal', 'status_code', 'status_description', 'validation_by'];

    /**
     * Get the user that owns the HistoryWithdraw
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
