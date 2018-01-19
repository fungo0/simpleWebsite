<?php

namespace App\Http\Controllers;

use DB;
use View;
use Auth;
use Storage;
use Session;
use Carbon\Carbon;
use App\User;
use App\Course;
use App\Discipline;
use App\CourseDetail;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth', 'course'])->except('index', 'materials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderby('id', 'desc')->get();

        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplines = Discipline::lists('discipline', 'id');

        return view('courses.create')->with('disciplines', $disciplines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'discipline' => 'required', 
            'level' => 'required',
            'duration' => 'required',
            'location' => 'required',
        ]);

        $course = Course::create([
            'name' => $request->input('name'),
            'duration' => $request->input('duration'),
            'level' => $request->input('level'),
            'location' => $request->input('location'),
        ]);

        $coursedetail = $course->CourseDetail()->create([
            'discipline_id' => $request->input('discipline'),
            'user_id' => Auth::user()->id,
            
        ]);

        $courses = Course::orderby('id', 'desc')->get();

        return view('courses.index', compact('courses'))->with('flash_message', 'Course successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('courses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $disciplines = Discipline::lists('discipline', 'id');

        return view('courses.edit', compact('course', 'disciplines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'level' => 'required',
            'duration' => 'required',
            'location' => 'required',
        ]);

        Course::where('id', $id)->update([
            'name' => $request->input('name'), 
            'level' => $request->input('level'), 
            'duration' => $request->input('duration'), 
            'location' => $request->input('location')
        ]);

        $courses = Course::orderby('id', 'desc')->get();

        $course = Course::findOrFail($id);
        $users = User::role('User')->get();
        foreach ($users as $user)
            $user->notify(new UserNotification($course, $user, "Course"));

        return redirect()->route('courses.index')->with('flash_message', 'Course successfully updated')->with('courses', $courses);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->CourseDetail()->delete();
        $course->delete();

        $courses = Course::orderby('id', 'desc')->get();

        return redirect()->route('courses.index')->with('flash_message', 'Course successfully deleted')->with('courses', $courses);
    }

    public function unreadNotification () 
    {
        if (!Auth::guest()){
            $notifications = Auth::user()->unreadNotifications;

            $count1 = $notifications->count();
            $count2 = DB::table('update_course_log')->count();
            $count3 = $count2 - $count1;

            $oldcontents = DB::table('update_course_log')->skip($count3)->take($count1)->orderBy('id', 'desc')->get();

            return view('change')->with('notifications', $notifications)->with('oldcontents', $oldcontents);
        }else{
            return Redirect::to('/error');
        }
    }

    public function readNotification () 
    {
        if (!Auth::guest()){
            $user = Auth::user();
            $user->unreadNotifications->markAsRead();
            Session::put('notifications', 0);
            return Redirect::to('/change');
        }else{
            return Redirect::to('/error');
        }
    }

    public function materials ()
    {
        $materials = DB::table('materials')->groupBy('discipline', 'id')->get();

        return view('material', compact('materials'));
    }

    public function uploadmaterial (Request $request)
    {
        if ($request->file('material') != null){  
            $discipline = Discipline::findOrFail($request->input('discipline'));

            $name = $request->file('material')->getClientOriginalName();
            $hashname = $request->file('material')->hashName();

            $material = DB::table('materials')->insert([
                [
                    'user_id' => Auth::user()->id, 
                    'discipline' => $discipline->discipline,
                    'name' => $name,
                    'hashname' => $hashname,
                    'filesize' => $request->file('material')->getClientSize(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]);

            if ($material){
                Storage::disk('uploads')->put('coursematerial', $request->file('material'));

                $materials = DB::table('materials')->groupBy('discipline', 'id')->get();

                return view('material')->with('flash_message', 'PDF uploaded successfully')->with('materials', $materials);
            }
        }else{
            return Redirect::to('/error');
        }
        
    }
}
