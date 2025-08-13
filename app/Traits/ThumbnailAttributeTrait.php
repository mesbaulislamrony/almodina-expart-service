<?php

namespace App\Traits;

trait ThumbnailAttributeTrait
{
    public function getThumbnailAttribute()
    {
        if (empty($this->image)) {
            return asset('assets/images/thumbnail.jpg');
        }

        return asset($this->image);
    }
}
