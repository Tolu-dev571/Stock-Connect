<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'livestock_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'delivery_address',
        'quantity',
        'total_price',
        'status',
        'payment_reference',
        'payment_status',
        'payment_proof',
    ];

    /*
    |--------------------------------------------------------------------------
    | LIVESTOCK
    |--------------------------------------------------------------------------
    */

    public function livestock(): BelongsTo
    {
        return $this->belongsTo(Livestock::class);
    }

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER / USER
    |--------------------------------------------------------------------------
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | REVIEW
    |--------------------------------------------------------------------------
    */

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}