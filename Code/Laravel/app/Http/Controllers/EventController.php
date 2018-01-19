<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Session;
use App\User;
use App\Event;
use App\Comment;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth', 'event'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderby('id', 'desc')->paginate(7);

        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'speaker' => 'required|max:50',
            'location' => 'required', 
            'venue' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $event = Event::create([
        	'user_id' => Auth::user()->id,
            'speaker' => $request->input('speaker'),
            'location' => $request->input('location'),
            'venue' => $request->input('venue'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        $events = Event::orderby('id', 'desc')->paginate(7);

        return view('events.index', compact('events'))->with('flash_message', 'Event successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $user = User::findOrFail($event->user_id);
        $comments = Comment::where('event_id', $id)->whereHas('User', function($subquery) {
                                    $subquery->where('user_id', '>', 0);
                                })->get();

        return view('events.show', compact('event', 'user', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
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
            'speaker' => 'required|max:50',
            'location' => 'required', 
            'venue' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        Event::where('id', $id)->update([
        	'speaker' => $request->input('speaker'), 
        	'location' => $request->input('location'), 
        	'venue' => $request->input('venue'), 
        	'title' => $request->input('title'), 
        	'content' => $request->input('content')
        ]);

        $events = Event::orderby('id', 'desc')->get();

        return redirect()->route('events.index')->with('flash_message', 'Event successfully updated')->with('events', $events);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        $events = Event::orderby('id', 'desc')->get();

        return redirect()->route('events.index')->with('flash_message', 'Event successfully deleted')->with('events', $events);
    }

    public function comment(Request $request, $id)
    {
        if ($request->input('comment') != null){
            $this->validate($request, [
                'comment' => 'required',
            ]);

            $comment = Comment::create([
                'user_id' => Auth::user()->id,
                'event_id' => $id,
                'comment' => $request->input('comment')
            ]);

            return redirect()->route('events.show', $id);

        }else {
            return Redirect::to('/error');
        }
    }
}
