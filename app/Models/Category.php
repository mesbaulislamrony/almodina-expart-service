<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \App\Traits\ThumbnailAttributeTrait;
    
    protected static function booted()
    {
        static::addGlobalScope('category', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->orderBy('categories.id', 'asc');
        });
    }
}
