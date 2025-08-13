<?php

namespace App\Actions;

use App\Models\Coupon;

class CouponApplyAction
{
    public function execute($subtotal, $code): float
    {
        $discount = 0;
        $coupon = Coupon::where('code', $code)->first();

        if ($coupon->is_fixed_amount) {
            $discount = $coupon->amount;
        }
        $discount = (($subtotal * $coupon->amount) / 100);

        if($discount > $coupon->max) {
            $discount = $coupon->max;
        }

        $coupon->customers()->detach(auth()->user()->id);
        $coupon->customers()->attach(auth()->user()->id);

        return $discount;
    }
}
