<?php

namespace App\Actions;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AddToCartAction
{
    public function __invoke($product): void
    {
        Cart::where(['email' => Auth::user()->email, 'product_id' => $product->id])->delete();
        if ($product->qty >= 1) {
            $array = $product->only('qty', 'price', 'total');
            $array['email'] = Auth::user()->email;
            $array['product_id'] = $product->id;
            Cart::create($array);
        }
    }
}
