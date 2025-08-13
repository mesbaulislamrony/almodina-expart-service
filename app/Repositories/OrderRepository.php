<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Actions\CouponApplyAction;

class OrderRepository
{
    protected $action;
    public function __construct(CouponApplyAction $action)
    {
        $this->action = $action;
    }

    public function order($request)
    {
        $coupon = auth()->user()->coupons()->where('used', 0)->first();
        $carts = Cart::where('email', auth()->user()->email)->get();
        $array['customer_id'] = auth()->user()->id;
        $array['project_no'] = Str::upper(Str::random(8));
        $array['subtotal'] = $carts->sum('total');
        $array['discount'] = 0;
        if ($coupon) {
            $array['discount'] = $this->action->execute($array['subtotal'], $coupon->code);
            $coupon->pivot->update(['used' => 1]);
        }
        $array['payable'] = ($array['subtotal'] - $array['discount']);
        $array['address'] = $request->address;
        $array['note'] = $request->note;
        $array['scheduled_at'] = Carbon::parse($request->schedule)->toDateTimeString();
        $project = Project::create($array);
        $tasks = $carts->map(function ($cart) use ($project) {
            $cart->project_id = $project->id;
            $cart->created_at = now();
            $cart->updated_at = now();
            return $cart->except('id', 'email');
        })->toArray();
        $project->tasks()->insert($tasks);
        Cart::where(['email' => auth()->user()->email])->delete();
    }
}
