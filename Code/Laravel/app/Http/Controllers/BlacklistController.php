<?php

namespace App\Http\Controllers;

use App\Blacklist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    public function blacklist() {
    	$now = Carbon::now();
		$year = $now->year;
		$month = $now->month;

    	$blacklists = Blacklist::whereYear('created_at', '=', $year)
								->whereMonth('created_at', '=', $month)
								->get();

		return view('admins.blacklist', compact('blacklists'));
    }
}
