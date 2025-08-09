<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home()
    {
        $data['categories'] = Category::query()->get();
        $data['services'] = Service::take(4)->get();
        $data['popular'] = Service::take(8)->get();

        return view('welcome', $data);
    }

    public function categories($slug)
    {
        $data['categories'] = Category::query()->get();
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
                })->with('service')->when(auth()->check(), function ($query) {
                    return $query->with('cart', function ($query) {
                        return $query->where('email', auth()->user()->email);
                    });
                });
            });
        }, 'variants', 'reviews'])->where('slug', $slug)->first();
        $data['tab'] = $request->tab;

        return view('services', $data);
    }
}
