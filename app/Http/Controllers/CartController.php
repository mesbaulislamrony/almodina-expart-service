<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreRequest;

class CartController extends Controller
{
    public function destroy($id)
    {
        Cart::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Cart item removed successfully.');
    }
}
