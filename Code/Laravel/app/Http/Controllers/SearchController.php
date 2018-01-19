<?php

namespace App\Http\Controllers;
 
use Session;
use App\User;
use App\Post;
use App\Event;
use App\Course;
use App\Discipline;
use App\UserProfile;
use App\CourseDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
	public function filter(Request $request) {
        if ($request->input('search') !== null){
        	if ($request->input('search') == null || $request->input('search') == "" || $request->input('search') == " ")
        		return view('errors.wrong')->with('error', 'Keywords not found! Keyword is either empty or containing space only.');
        	
            $request->session()->put('input', $request->input('search'));
        }else{
            return Redirect::to('/error');
        }
        return Redirect::to('/result');
    }
	
    public function postsearch() {
    	$input = Session::get('input');
        $count = Post::search($input)->count();
    	$searches = Post::search($input)->simplePaginate(5);

    	if (!$searches->isEmpty())
    		return view('result', compact('searches'))->with('input', $input)->with('count', $count);
    	else
    		return view('errors.wrong')->with('error', 'Result cannot be found!');
    }

    public function coursesearch(Request $request) {
        if ($request->input('discipline') !== null && $request->input('location') != null){
            $this->validate($request, [
                'discipline' => 'required', 
                'level' => 'required',
                'duration' => 'required',
                'location' => 'required',
            ]);

            $discipline = $request->input('discipline');
            $level = $request->input('level');
            $duration = $request->input('duration');
            $location = $request->input('location');

            if ($level == 0 && $duration == 0){
                $queries = Course::where('location', $location)->whereHas('CourseDetail', function($subquery) use($discipline) {
                                    $subquery->where('discipline_id', '=', $discipline);
                                })->get();
            } elseif ($level == 0){
                $queries = Course::where('location', $location)->orWhere('duration', $duration)
                                ->whereHas('CourseDetail', function($subquery) use($discipline) {
                                    $subquery->where('discipline_id', '=', $discipline);
                                })->get();
            } elseif ($duration == 0){
                $queries = Course::where('location', $location)->orWhere('level', $level)
                                ->whereHas('CourseDetail', function($subquery) use($discipline) {
                                    $subquery->where('discipline_id', '=', $discipline);
                                })->get();
            } elseif ($request->input('strict')){
                if ($level == 0 || $duration == 0)
                    return view('courselist')->with('failed', 'To use STRICT Search, you must input all criterion!');
                else{
                    $queries = Course::where('location', $location)->where('level', $level)->where('duration', $duration)
                                ->whereHas('CourseDetail', function($subquery) use($discipline) {
                                    $subquery->where('discipline_id', '=', $discipline);
                                })->get();
                }
            } else{
                $queries = Course::where('location', $location)->orWhere('level', $level)->orWhere('duration', $duration)
                                ->whereHas('CourseDetail', function($subquery) use($discipline) {
                                    $subquery->where('discipline_id', '=', $discipline);
                                })->get();
            }

            if ($queries)
                return view('courselist')->with('queries', $queries);
            else
                return view('courselist')->with('failed', 'No relevant record can be found! Please try with other criteria again!');
        }else{
            return Redirect::to('/error');
        }
    }

    public function usersearch() {
        $input = Session::get('input');
        $users = UserProfile::search($input, ['nickname', 'user.name', 'user.email'])->get();

        if ($users)
            return view('admins.result')->with('users', $users);
        else
            view('errors.wrong')->with('error', 'Result cannot be found!');
    }
}
