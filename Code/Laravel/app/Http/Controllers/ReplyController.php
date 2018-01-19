<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function display() {
    	$messages = Message::latest()->limit(15)->get();
    	$count = $messages->count();

    	if ($messages) {
    		return view('admins.reply', compact('messages', 'count'));
    	}
    }
}
