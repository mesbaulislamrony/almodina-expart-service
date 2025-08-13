<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'used'
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
