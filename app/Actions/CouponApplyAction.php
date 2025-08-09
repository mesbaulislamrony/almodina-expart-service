<?php

namespace App\Actions;

use App\Models\Coupon;

class CouponApplyAction
{
    public function __invoke($subtotal, $code): float
    {
        $coupon = Coupon::where('code', $code)->first();
        if ($coupon) {
            if ($coupon->type == 'percentage') {
                $discount = ($subtotal * $coupon->amount) / 100;

                return $discount;
            }

            return $coupon->amount;
        }

        return 0;
    }
}
