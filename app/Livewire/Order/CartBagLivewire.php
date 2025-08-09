<?php

namespace App\Livewire\Order;

use Livewire\Attributes\On;
use Livewire\Component;

class CartBagLivewire extends Component
{
    public $items;

    public $subtotal = 0;

    public function mount()
    {
        $this->updateCartBag();
    }

    #[On('update-cart-bag')]
    public function updateCartBag()
    {
        if (! auth()->check()) {
            return false;
        }
        $this->items = auth()->user()->carts()->with('product')->get();
        $this->subtotal = $this->items->sum('subtotal');
    }

    public function render()
    {
        return view('livewire.order.cart-bag-livewire');
    }
}
