<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $slug)
    {
        $data['categories'] = Category::query()->get();
        $data['category'] = Category::where('slug', $slug)->first();
        $data['services'] = Service::whereHas('category', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->get();

        return view('categories', $data);
    }
}
