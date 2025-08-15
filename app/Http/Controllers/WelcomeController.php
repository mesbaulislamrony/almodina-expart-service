<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;

class WelcomeController extends Controller
{
    public function home()
    {
        $data['categories'] = Category::query()->get();
        $data['services'] = Service::take(4)->get();
        $data['popular'] = Service::take(8)->get();

        return view('welcome', $data);
    }
}
