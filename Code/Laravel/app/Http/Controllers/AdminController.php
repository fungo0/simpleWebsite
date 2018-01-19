<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use App\Message;
use App\Blacklist;
use Carbon\Carbon;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
	public function userCount() {
		$now = Carbon::now();
		$year = $now->year;
		$month = $now->month;

		$user = User::role('user')
					->whereYear('created_at', '=', $year)
					->whereMonth('created_at', '=', $month)
					->count();

		$post = Post::whereYear('created_at', '=', $year)
					->whereMonth('created_at', '=', $month)
					->count();

		$message = Message::whereYear('created_at', '=', $year)
							->whereMonth('created_at', '=', $month)
							->count();

		$warning = Blacklist::whereYear('created_at', '=', $year)
							->whereMonth('created_at', '=', $month)
							->count();

		return view('admins.home2', compact('user', 'post', 'message', 'warning'));
	}
}