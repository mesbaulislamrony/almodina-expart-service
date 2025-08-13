<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationControlelr extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['notifications'] = auth()->user()->notifications()->get();
        return view('notification.index', $data);
    }
}
