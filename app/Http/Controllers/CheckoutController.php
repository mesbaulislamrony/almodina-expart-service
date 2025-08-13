<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\ScheduleService;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Checkout\StoreRequest;

class CheckoutController extends Controller
{
    public function create(Request $request, ScheduleService $service)
    {
        $data['items'] = Cart::where('email', auth()->user()->email)->get();
        $data['contact'] = $request->name . ' ' . $request->mobile_no;
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
