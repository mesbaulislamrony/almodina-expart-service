<?php

namespace App\Livewire\Order;

use App\Actions\AddToCartAction;
use Livewire\Component;

class AddToCartLivewire extends Component
{
    public $product;

    public $qty = 0;

    public function mount($product)
    {
        $this->product = $product;
        $this->product->total = 0;
        if ($product->cart) {
            $this->qty = $product->cart->qty;
            $this->product->total = $product->cart->total;
        }
    }

    public function increment(AddToCartAction $action)
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }
        $this->qty++;
        $this->product->qty = $this->qty;
        $this->product->total = $this->product->price * $this->qty;
        $action($this->product);
        $this->dispatch('update-cart-bag');
    }

    public function decrement(AddToCartAction $action)
    {
        if ($this->qty > 0) {
            $this->qty--;
        }
        $this->product->qty = $this->qty;
        $this->product->total = $this->product->price * $this->qty;
        $action($this->product);
        $this->dispatch('update-cart-bag');
    }

    public function render()
    {
        return view('livewire.order.add-to-cart-livewire');
    }
}
