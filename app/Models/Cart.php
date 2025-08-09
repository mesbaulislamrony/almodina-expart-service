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

    public $casts = [
        'subtotal' => 'integer',
        'discount' => 'integer',
        'total' => 'integer',
    ];

    protected static function booted()
    {
        static::addGlobalScope('carts', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->orderBy('carts.id', 'desc');
        });
    }

    public function getUrlAttribute()
    {
        if ($this->product->variant) {
            return route('services', $this->product->service->slug).'?tab='.$this->product->variant->slug;
        }

        return route('services', $this->product->service->slug);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
