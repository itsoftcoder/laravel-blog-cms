<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required | email | unique:subscribers',
        ]);
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        if ($subscriber->save()){
            return back()->with(['status' => 'Thank you for subscribed this website.send message any of latest post of this website']);
        }
    }
}
