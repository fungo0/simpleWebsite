<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Blacklist;
use Illuminate\Http\Request;


class ErrorController extends Controller
{
    public function errorRecord() {
    	$ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));

    	$blacklist = new Blacklist;
    	$blacklist->ip_address = $ip;

    	if (!Auth::guest())
    		$blacklist->user_id = Auth::user()->id;

    	$blacklist->save();

    	return view('errors.503');

    }
}
