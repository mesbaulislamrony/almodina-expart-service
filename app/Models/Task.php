<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'project_id',
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
