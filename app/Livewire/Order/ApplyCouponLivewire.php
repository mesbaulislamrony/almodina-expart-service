<?php

namespace App\Livewire\Order;

use Livewire\Component;

class ApplyCouponLivewire extends Component
{
    public $subtotal = 0;

    public $discount = 0;

    public $payable = 0;

    public function mount()
    {
        $this->updateTotals();
    }

    public function updateTotals()
    {
        $items = auth()->user()->carts()->get();
        $this->subtotal = $items->sum('subtotal');
        $this->payable = ($items->sum('total') - $this->discount);
    }

    public function apply()
    {
        $this->discount = 50;
        $this->updateTotals();
    }

    public function render()
    {
        return view('livewire.order.apply-coupon-livewire');
    }
}
