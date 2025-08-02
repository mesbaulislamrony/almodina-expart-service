<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $data['wishlists'] = auth()->user()->services()->get();
        return view('wishlist.index', $data);
    }

    public function store(Request $request, $slug)
    {
        $service = \App\Models\Service::where('slug', $slug)->first();
        auth()->user()->services()->detach($service);
        auth()->user()->services()->attach($service);
        return back();
    }

    public function destroy(Request $request, $id)
    {
        $service = \App\Models\Service::where('id', $id)->first();
        auth()->user()->services()->detach($service);
        return back();
    }
}
