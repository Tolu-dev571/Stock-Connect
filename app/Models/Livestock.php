<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    protected $fillable = [
        'name',
        'category',
        'breed',
        'description',
        'price',
        'quantity',
        'age',
        'weight',
        'image',
        'status',
    ];
    public function orders()
{
    return $this->hasMany(Order::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}
}
