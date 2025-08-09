<?php

namespace App\View\Components;

use App\Models\Location;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

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
