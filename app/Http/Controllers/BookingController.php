<?php

namespace App\Http\Controllers;

use App\Models\Task;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Task::with('product', 'product.variant', 'product.service', 'product.service.category')->whereHas('project', function ($query) {
            $query->where('customer_id', auth()->user()->id);
        })->orderBy('id', 'desc')->get();

        $data['bookings'] = [];
        if($bookings->count() > 0) {
            foreach ($bookings as $booking) {
                $data['bookings'][$booking->product->service->slug]['name'] = $booking->product->service->name . ' (' . $booking->product->service->category->name . ')';
                $data['bookings'][$booking->product->service->slug]['url'] = $booking->product->service->url;

                $product = $booking->product->name . '(' . $booking->product->price . ' Tk' . ')';
                if ($booking->product->variant) {
                    $product = $booking->product->name . ' ' . $booking->product->variant->name . '(' . $booking->product->price . ' Tk' . ')';
                }
                $data['bookings'][$booking->product->service->slug]['products'][] = $product;
            }
        }
        return view('booking.index', $data);
    }
}
