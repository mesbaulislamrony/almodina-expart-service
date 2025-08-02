<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartBag extends Component
{
    public $total = 0;

    public function mount()
    {
        $this->total = 0;
        if (Auth::check()) {
            $this->total = Cart::where('email', auth()->user()->email)->count();
        }
    }

    public function render()
    {
        return view('livewire.cart.cart-bag');
    }
}
