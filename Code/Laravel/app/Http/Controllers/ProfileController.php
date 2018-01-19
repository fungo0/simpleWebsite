<?php

namespace App\Http\Controllers;

use Storage;
use Session;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function profile() {
    	$query = User::where('id', Auth::user()->id)->first();
    	$query2 = UserProfile::where('id', Auth::user()->id)->first();

    	if ($query && $query2)
    		return view('profile', compact('query', 'query2'));
    	else
    		return view('errors.wrong')->with('error', 'Something bad happened..... Please try again later!');
    }

    public function edit() {
        $detail = User::where('id', Auth::user()->id)->first();
        $edit = UserProfile::where('id', Auth::user()->id)->first();

        if ($detail && $edit)
            return view('editprofile', compact('edit', 'detail'));
        else
            return view('errors.wrong')->with('error', 'Something bad happened..... Please try again later!');
    }

    public function update(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:120',
            'nickname'=>'required|max:120',
            'phone'=>'required',
            'password'=>'required|min:6|confirmed',
        ]);

        if ($request->input('password') !== null) {
            User::where('id', Auth::user()->id)->update([
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password'))
            ]);

            UserProfile::where('user_id', Auth::user()->id)->update([
                'nickname' => $nickname = $request->input('nickname'),
                'mobile' => $phone = $request->input('phone')
            ]);

            Session::flash('info', 'Profile successfully updated.');
            return Redirect::to('/profile');
        }else{
            return Redirect::to('/error');
        }
    }

    public function changeicon(Request $request) {
        if ($request->file('avatar') != null) {
            $hashname = $request->file('avatar')->hashName();

            UserProfile::where('user_id', Auth::user()->id)->update([
                'icon' => $hashname
            ]);

            $id = Auth::user()->id;
            $name = Auth::user()->name;

            Storage::disk('uploads')->put('avatar/avatar'.$id.$name, $request->file('avatar'));

            Session::flash('info', 'Profile icon successfully updated.');
            return Redirect::to('/profile');
        } else{
            Session::flash('info', 'Nothing updated.');
            return Redirect::to('/profile');
        }
    }
}
