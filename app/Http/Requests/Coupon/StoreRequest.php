<?php

namespace App\Http\Requests\Coupon;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'exists:coupons', function ($attribute, $value, $fail) {
                $this->validateCouponCode($attribute, $value, $fail);
            }],
        ];
    }

    private function validateCouponCode($attribute, $value, $fail)
    {
        $coupon = Coupon::where('code', $value)->first();

        if (! $coupon) {
            return;
        }

        if (! Carbon::now()->between($coupon->valid_from, $coupon->valid_until)) {
            $fail('Coupon has expired.');

            return;
        }

        if ($coupon->limit == 0) {
            $fail('Coupon usage limit exceeded.');

            return;
        }

        if ($coupon->customers()->where(['customer_id' => Auth::user()->id, 'used' => 1])->exists()) {
            $fail('Coupon already used.');

            return;
        }
    }
}
