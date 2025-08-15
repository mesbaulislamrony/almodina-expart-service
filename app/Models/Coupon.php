<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'amount',
        'is_fixed_amount',
        'max',
        'used',
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
