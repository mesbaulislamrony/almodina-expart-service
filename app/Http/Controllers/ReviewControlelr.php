<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class ReviewControlelr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['reviews'] = Review::with('service')->where('customer_id', auth()->user()->id)->get();

        return view('review.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $data['service'] = Service::where('slug', $slug)->first();

        return view('review.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'content' => 'required',
        ]);
        $service = Service::where('slug', $request->slug)->first();
        $validate['service_id'] = $service->id;
        auth()->user()->reviews()->create($validate);

        return redirect()->route('review.index')->with('success', __('Review created successfully.'));
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
