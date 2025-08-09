<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use \App\Traits\ThumbnailAttributeTrait;

    protected static function booted()
    {
        static::addGlobalScope('service', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->orderBy('services.id', 'asc');
        });
    }

    public function getUrlAttribute()
    {
        if ($this->variants()->count() == 0) {
            return route('services', $this->slug);
        }

        return route('services', $this->slug).'?tab='.$this->variants()->min('slug');
    }

    public function getPriceAttribute()
    {
        return $this->products()->min('price');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
