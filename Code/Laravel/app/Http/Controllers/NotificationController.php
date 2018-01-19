<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
    public function unreadNotification () {
    	if (!Auth::guest()){
	    	$notifications = Auth::user()->unreadNotifications;

	    	return view('admins.notifications')->with('notifications', $notifications);
	    }else{
	    	return Redirect::to('/error');
	    }
    }

    public function readNotification () {
    	if (!Auth::guest()){
	    	$user = Auth::user();
	    	$user->unreadNotifications->markAsRead();
	    	return Redirect::to('/notifications');
	    }else{
	    	return Redirect::to('/error');
	    }
	}
}
