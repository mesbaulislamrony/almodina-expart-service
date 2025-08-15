<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\StoreRequest;
use App\Models\Cart;
use App\Repositories\OrderRepository;
use App\Services\ScheduleService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function create(Request $request, ScheduleService $service)
    {
        $data['items'] = Cart::where('email', Auth::user()->email)->get();
        $data['contact'] = $request->name.' '.$request->mobile_no;
        $data['weekes'] = $service->getAvailableDates();
        $data['hours'] = $service->getAvailableHours();
        $data['scheduled_at'] = Carbon::now()->addDay(1)->addMinute(30)->format('l M Y h:i A');
        $data['address'] = $request->address;
        $data['query_string'] = http_build_query($request->all());

        return view('checkout.create', $data);
    }

    public function store(StoreRequest $request, OrderRepository $repository)
    {
        $repository->order($request);

        return redirect()->route('booking.index')->with('success', __('Project created successfully.'));
    }
}
