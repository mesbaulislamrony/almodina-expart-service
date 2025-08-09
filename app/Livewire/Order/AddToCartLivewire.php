<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Repository\Order\AddToCartRepository;

class AddToCartLivewire extends Component
{
    public $product;
    public $qty = 0;

    public function mount($product)
    {
        $this->product = $product;
        $this->product->subtotal = 0;
        if($product->cart) {
            $this->qty = $product->cart->qty;
            $this->product->subtotal = $product->cart->subtotal;
        }
    }

    public function increment(AddToCartRepository $repository)
    {
        $this->qty++;
        $this->product->qty = $this->qty;
        $this->product->subtotal = $this->product->price * $this->qty;
        $repository->store($this->product);
        $this->dispatch('update-cart-bag');
    }

    public function decrement(AddToCartRepository $repository)
    {
        if ($this->qty > 0) {
            $this->qty--;
        }
        $this->product->qty = $this->qty;
        $this->product->subtotal = $this->product->price * $this->qty;
        $repository->store($this->product);
        $this->dispatch('update-cart-bag');
    }

    public function render()
    {
        return view('livewire.order.add-to-cart-livewire');
    }
}
