<?php

namespace App\Repository\Order;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AddToCartRepository
{
    public function store($product)
    {
        Cart::where(['email' => auth()->user()->email, 'product_id' => $product->id])->delete();
        if($product->qty >= 1) {
            $array = $product->only('qty', 'price', 'subtotal');
            $array['email'] = auth()->user()->email;
            $array['product_id'] = $product->id;
            $array['discount'] = 0;
            $array['total'] = ($array['subtotal'] - $array['discount']);
            Cart::create($array);
        }
    }
}
