<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Actions\CouponApplyAction;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Coupon\StoreRequest;

class ApplyCouponLivewire extends Component
{
    public $subtotal = 0;

    public $discount = 0;

    public $payable = 0;

    public $code;

    public function mount()
    {
        $this->updateTotals();
    }

    public function updateTotals()
    {
        $items = Auth::user()->carts()->get();
        $this->subtotal = $items->sum('total');
        $this->payable = ($items->sum('total') - $this->discount);
    }

    public function apply(CouponApplyAction $action)
    {
        $this->validate();
        $this->discount = $action->execute($this->subtotal, $this->code);
        $this->updateTotals();
    }

    protected function rules()
    {
        return (new StoreRequest)->rules();
    }

    public function render()
    {
        return view('livewire.order.apply-coupon-livewire');
    }
}
