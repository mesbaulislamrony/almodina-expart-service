<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
    public function create()
    {
        $data['carts'] = Cart::where('email', auth()->user()->email)->get();
        $data['date'] = date('Y-m-d');
        $data['time'] = date('H:i');
        return view('order.checkout', $data);
    }

    public function store(Request $request)
    {
        $carts = Cart::where('email', auth()->user()->email)->get();
        $array['customer_id'] = auth()->user()->id;
        $array['project_no'] = Str::upper(Str::random(8));
        $array['scheduled_at'] = $request->date . ' ' . $request->time;
        $array['subtotal'] = $carts->sum('subtotal');
        $array['discount'] = $carts->sum('discount');
        $array['payable'] = $carts->sum('total');
        $array['address'] = auth()->user()->address;
        $array['note'] = $request->note;
        $project = Project::create($array);
        $tasks = $carts->map(function ($cart) use ($project) {
            $cart->project_id = $project->id;
            $cart->created_at = now();
            $cart->updated_at = now();
            return $cart->except('id', 'email');
        })->toArray();
        $project->tasks()->insert($tasks);
        Cart::where('email', auth()->user()->email)->delete();
        return redirect()->route('welcome');
    }
}
