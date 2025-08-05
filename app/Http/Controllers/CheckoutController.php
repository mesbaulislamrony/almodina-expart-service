<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\Cookie;
use Carbon\CarbonPeriod;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function create()
    {
        $data['carts'] = Cart::where('email', auth()->user()->email)->get();
        $data['date'] = date('Y-m-d');
        $data['time'] = date('H:i');

        $count = 7;
        $datesArray = [];
        $period = CarbonPeriod::create(Carbon::today(), '1 day', Carbon::today()->addDays($count - 1));
        foreach ($period as $date) {
            $datesArray[] = [
                'day' => $date->format('d'),
                'name' => $date->isToday() ? 'Today' : $date->format('D'),
                'date' => $date->format('Y-m-d'),
            ];
        }

        $startPeriod = Carbon::parse('9:00');
        $endPeriod = Carbon::parse('18:00');
        $period = CarbonPeriod::create($startPeriod, '1 hour', $endPeriod);
        $hours  = [];
        foreach ($period as $date) {
            $hours[] = $date->format('h:i A') . ' - ' . $date->addHour(1)->format('h:i A');
        }
        $data['weekes'] = $datesArray;
        $data['hours'] = $hours;
        return view('checkout', $data);
    }

    public function store(Request $request)
    {
        $carts = Cart::where('email', auth()->user()->email)->get();
        $array['customer_id'] = auth()->user()->id;
        $array['project_no'] = Str::upper(Str::random(8));
        $array['scheduled_at'] = $request->date . ' ' . $request->time;
        $array['subtotal'] = $carts->sum('subtotal');
        $array['discount'] = $carts->sum('discount');
        $array['payable'] = $carts->sum('total');
        $array['address'] = auth()->user()->address;
        $array['note'] = $request->note;
        $project = Project::create($array);
        $tasks = $carts->map(function ($cart) use ($project) {
            $cart->project_id = $project->id;
            $cart->created_at = now();
            $cart->updated_at = now();
            return $cart->except('id', 'email');
        })->toArray();
        $project->tasks()->insert($tasks);
        Cart::where('email', auth()->user()->email)->delete();
        return redirect()->route('welcome');
    }
}
