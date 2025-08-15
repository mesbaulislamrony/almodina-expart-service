<?php

namespace App\Actions;

use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class CouponApplyAction
{
    /**
     * Applies a coupon to a cart and returns the discount.
     *
     * @param  float  $subtotal
     * @param  string  $code
     * @return float
     */
    public function execute($subtotal, $code): float
    {
        $coupon = Coupon::where('code', $code)->first();

        if ($coupon) {
            $discount = 0;

            if ($coupon->is_fixed_amount) {
                $discount = $coupon->amount;
            } else {
                $discount = (($subtotal * $coupon->amount) / 100);
            }

            if ($discount > $coupon->max) {
                $discount = $coupon->max;
            }

            $coupon->customers()->detach(Auth::user()->id);
            $coupon->customers()->attach(Auth::user()->id);

            return $discount;
        }

        return 0;
    }
}
