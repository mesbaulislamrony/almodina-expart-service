<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;

class ReviewControlelr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['reviews'] = Review::with('service')->where('customer_id', auth()->user()->id)->get();

        return view('review.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $service)
    {
        $validate = $request->validate([
            'comment' => 'required',
            'rating' => 'required',
        ]);
        
        $validate['service_id'] = Service::where('slug', $service)->value('id');
        auth()->user()->reviews()->create($validate);

        return redirect()->back()->with('success', __('Review created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
