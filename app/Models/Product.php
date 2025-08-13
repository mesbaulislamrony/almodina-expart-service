<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
