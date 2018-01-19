<?php

namespace App\Http\Controllers;

use View;
use Auth;
use App\User;
use App\Course;
use App\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function showPayment() {
    	return view('payment');
    }

    public function testPayment(Request $request) {
    	$token = $request->stripeToken;

    	$payment = Auth::User()->newSubscription('main', 'Monthly')->create($token);

    	$userid = Auth::user()->id;

    	$admissions = Admission::whereHas('User', function($subquery) use($userid) {
                                    $subquery->where('user_id', '=', $userid);
                                })->whereHas('Course', function($subquery2) {
                                    $subquery2->where('course_id', '>', 0);
                                })->get();

    	return view('mycourse', compact('admissions'))->with('flash_message', 'Thank You for your subscription');

    }

    public function pay() {
    	$userid = Auth::user()->id;

    	$admissions = Admission::whereHas('User', function($subquery) use($userid) {
                                    $subquery->where('user_id', '=', $userid);
                                })->whereHas('Course', function($subquery2) {
                                    $subquery2->where('course_id', '>', 0);
                                })->get();

    	return view('mycourse', compact('admissions'));
    }
}
