<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
