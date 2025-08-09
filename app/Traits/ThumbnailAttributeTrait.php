<?php

namespace App\Traits;

trait ThumbnailAttributeTrait
{
    public function getThumbnailAttribute()
    {
        if (empty($this->image)) {
            return asset('assets/thumbnail.png');
        }

        return asset($this->image);
    }
}
