<?php

namespace App\Http\Controllers;

use App\Models\Sku;
use App\Models\City;
use App\Models\Package;
use App\Models\Service;
use App\Models\Category;
use App\Models\Location;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WelcomeController extends Controller
{
    public function home()
    {
        $data['categories'] = Category::query()->get();
        $data['services'] = Service::query()->get();
        return view('welcome', $data);
    }

    public function categories($slug)
    {
        $data['category'] = Category::where('slug', $slug)->first();
        $data['services'] = Service::whereHas('category', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->get();
        return view('categories', $data);
    }

    public function services(Request $request, $slug)
    {
        $data['service'] = Service::with(['products' => function ($query) use ($request) {
            return $query->when($request->tab, function ($query) use ($request) {
                return $query->whereHas('variant', function ($query) use ($request) {
                    return $query->where('slug', $request->tab);
                });
            });
        }, 'variants', 'reviews'])->where('slug', $slug)->first();
        return view('product', $data);
    }

    public function setCurrentLocation(Request $request)
    {
        $location = Location::find($request->location);
        Cookie::queue('location', $location->slug, 60);
        return redirect()->route('welcome');
    }
}
