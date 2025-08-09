<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\StoreRequest;
use App\Models\Cart;
use App\Models\Project;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function create()
    {
        $data['items'] = Cart::where('email', auth()->user()->email)->get();

        return view('checkout', $data);
    }

    public function store(StoreRequest $request)
    {
        $carts = Cart::where('email', auth()->user()->email)->get();
        $array['customer_id'] = auth()->user()->id;
        $array['project_no'] = Str::upper(Str::random(8));
        $array['subtotal'] = $carts->sum('subtotal');
        $array['discount'] = $carts->sum('discount');
        $array['payable'] = $carts->sum('total');
        $project = Project::create($array);
        $tasks = $carts->map(function ($cart) use ($project) {
            $cart->project_id = $project->id;
            $cart->created_at = now();
            $cart->updated_at = now();

            return $cart->except('id', 'email');
        })->toArray();
        $project->tasks()->insert($tasks);
        Cart::where(['email' => auth()->user()->email])->delete();

        return redirect()->route('booking.index')->with('success', __('Project created successfully.'));
    }
}
