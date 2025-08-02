<?php

namespace App\View\Components;

use Closure;
use App\Models\Location;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;

class CurrentLocationPopup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dd(Cookie::get('location'));
        $location = Cookie::get('location');
        $data['locations'] = Location::query()->get();
        $data['location'] = Location::where('slug', $location)->first();
        return view('components.current-location-popup', $data);
    }
}
