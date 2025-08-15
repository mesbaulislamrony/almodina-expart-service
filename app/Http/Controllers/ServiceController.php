<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $slug)
    {
        $data['service'] = Service::with(['products' => function ($query) use ($request) {
            return $query->when($request->tab, function ($query) use ($request) {
                return $query->whereHas('variant', function ($query) use ($request) {
                    return $query->where('slug', $request->tab);
                })->with('service')->when(auth()->check(), function ($query) {
                    return $query->with('cart', function ($query) {
                        return $query->where('email', Auth::user()->email);
                    });
                });
            });
        }, 'variants', 'reviews', 'reviews.customer'])->where('slug', $slug)->first();
        $data['tab'] = $request->tab;

        return view('service.index', $data);
    }
}
