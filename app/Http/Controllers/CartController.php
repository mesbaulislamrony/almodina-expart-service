<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreRequest;

class CartController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::with('product')->where('email', auth()->user()->email)->get();
        return view('order.cart', $data);
    }

    public function store(StoreRequest $request)
    {
        $product = Product::where('code', $request->product_code)->first();
        Cart::where(['email' => auth()->user()->email, 'product_id' => $product->id])->delete();
        $array['email'] = auth()->user()->email;
        $array['product_id'] = $product->id;
        $array['qty'] = $request->qty;
        $array['price'] = $product->price;
        $array['subtotal'] = ($product->price * $request->qty);
        $array['total'] = $array['subtotal'];
        Cart::create($array);
        return redirect()->route('cart.index');
    }

    public function destroy($id)
    {
        Cart::where('id', $id)->delete();
        return redirect()->route('cart.index');
    }
}
