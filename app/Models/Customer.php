<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use \App\Traits\ThumbnailAttributeTrait;
    use \Illuminate\Notifications\Notifiable;

    public $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'email', 'email');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
