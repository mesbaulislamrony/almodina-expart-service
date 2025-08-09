<?php

namespace App\Livewire\Order;

use App\Models\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartBagLivewire extends Component
{
    public $items;

    public $total = 0;

    public function mount()
    {
        $this->updateCartBag();
    }

    #[On('update-cart-bag')]
    public function updateCartBag()
    {
        if (auth()->check()) {
            $this->items = Cart::where('email', auth()->user()->email)->get();
            $this->total = $this->items->sum('total');
        }
    }

    public function render()
    {
        return view('livewire.order.cart-bag-livewire');
    }
}
