<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\StoreRequest;
use App\Models\Cart;
use App\Repositories\OrderRepository;

class CheckoutController extends Controller
{
    public function create()
    {
        $data['items'] = Cart::where('email', auth()->user()->email)->get();

        return view('checkout', $data);
    }

    public function store(StoreRequest $request, OrderRepository $repository)
    {
        $repository->order($request);

        return redirect()->route('booking.index')->with('success', __('Project created successfully.'));
    }
}
