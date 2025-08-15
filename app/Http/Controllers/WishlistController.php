<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $data['services'] = Auth::user()->services()->get();

        return view('wishlist.index', $data);
    }

    public function store(Request $request, $slug)
    {
        $service = \App\Models\Service::where('slug', $slug)->first();
        Auth::user()->services()->detach($service);
        Auth::user()->services()->attach($service);

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $service = \App\Models\Service::where('id', $id)->first();
        Auth::user()->services()->detach($service);

        return back();
    }
}
