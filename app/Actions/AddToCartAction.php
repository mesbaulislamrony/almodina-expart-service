<?php

namespace App\Actions;

use App\Models\Cart;

class AddToCartAction
{
    public function __invoke($product): void
    {
        Cart::where(['email' => auth()->user()->email, 'product_id' => $product->id])->delete();
        if ($product->qty >= 1) {
            $array = $product->only('qty', 'price', 'total');
            $array['email'] = auth()->user()->email;
            $array['product_id'] = $product->id;
            Cart::create($array);
        }
    }
}
