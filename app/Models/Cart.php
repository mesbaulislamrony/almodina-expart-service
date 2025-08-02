<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'email',
        'product_id',
        'price',
        'qty',
        'subtotal',
        'discount',
        'total',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
