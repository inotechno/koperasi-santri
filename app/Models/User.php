<?php

namespace App\Models;

use App\Models\Store;
use App\Models\Wishlist;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'jenis_kelamin',
        'tanggal_lahir',
        'bank_code',
        'bank_name',
        'rekening',
        'rekening_atas_nama',
        'image',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $primaryKey = 'id';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get all of the wishlist for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function useraddress()
    {
        return $this->hasMany(UserAddress::class);
    }



    public function to_messages()
    {
        return $this->hasOne(Message::class, 'to'); // not as relevant, because these are all messages across conversations
    }

    public function from_messages()
    {
        return $this->hasOne(Message::class, 'from'); // not as relevant, because these are all messages across conversations
    }

    /**
     * Get all of the history_withdraw for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history_withdraw(): HasMany
    {
        return $this->hasMany(HistoryWithdraw::class);
    }

    public function product_visit()
    {
        return $this->hasMany(ProductVisits::class);
    }

    /**
     * The voucher that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'vouchers_users');
    }
}
