<?php

namespace App\Http\Controllers;

use View;
use Auth;
use App\User;
use App\Course;
use App\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdmissionController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth']);
    }

    public function register($id) {
    	$userid = Auth::user()->id;

    	$user = User::findOrFail($userid);
    	$user->Admission()->create([
    		'course_id' => $id,
    	]);

        $admissions = Admission::whereHas('User', function($subquery) use($userid) {
                                    $subquery->where('user_id', '=', $userid);
                                })->whereHas('Course', function($subquery2) {
                                    $subquery2->where('course_id', '>', 0);
                                })->get();

    	return view('mycourse',  compact('admissions'))->with('flash_message', 'Course successfully registered.');
    }

    public function unregister($id) {
    	$admission = Admission::findOrFail($id);
    	$admission->delete();

    	$userid = Auth::user()->id;
    	
    	$admissions = Admission::whereHas('User', function($subquery) use($userid) {
                                    $subquery->where('user_id', '=', $userid);
                                })->whereHas('Course', function($subquery2) {
                                    $subquery2->where('course_id', '>', 0);
                                })->get();

    	return view('mycourse', compact('admissions'))->with('flash_message', 'Course successfully unregistered.');
    }

    public function display() {
    	$userid = Auth::user()->id;

    	$admissions = Admission::whereHas('User', function($subquery) use($userid) {
                                    $subquery->where('user_id', '=', $userid);
                                })->whereHas('Course', function($subquery2) {
                                    $subquery2->where('course_id', '>', 0);
                                })->get();

    	return view('mycourse', compact('admissions'));
    }
}
