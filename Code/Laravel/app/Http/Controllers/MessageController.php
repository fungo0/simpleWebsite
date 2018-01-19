<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    public function message(Request $request) {
        if ($request->input('name') !== null && $request->input('email') !== null){
        	$this->validate($request, [
                'name'=>'required|string|max:50',
                'email'=>'required|string|email|max:255',
                'phone'=>'required|string|max:30',
                'message'=>'required|max:750',
            ]);

            $message = new Message;
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->phone = $request->input('phone');
            $message->message = $request->input('message');

            $message->save();

            return view('contacts')->with('success', 'Message successfully sent.');
        }else{
            return Redirect::to('/error');
        }
    }
}
