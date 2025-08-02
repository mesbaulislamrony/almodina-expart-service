<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subscriber\StoreRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        Subscriber::create([
            'email' => $request->email
        ]);
        return redirect()->route('welcome');
    }
}
