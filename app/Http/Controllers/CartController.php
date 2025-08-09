<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function destroy($id)
    {
        Cart::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Cart item removed successfully.');
    }
}
