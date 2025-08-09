<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $data['bookings'] = Project::where('customer_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('booking.index', $data);
    }

    public function show($id)
    {
        $data['booking'] = Project::with('tasks')->where('customer_id', auth()->user()->id)->where('id', $id)->first();
        return view('booking.show', $data);
    }
}
