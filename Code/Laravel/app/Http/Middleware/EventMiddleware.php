<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EventMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->is('events/create')) {
            //If speaker is creating a event
            if (!Auth::user()->hasPermissionTo('Create Event')) {
                return Redirect::to('/error');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('events/*/edit')) {
            //If speaker is editing a event
            if (!Auth::user()->hasPermissionTo('Edit Event')) {
                return Redirect::to('/error');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) {
            //If speaker is deleting a event
            if (!Auth::user()->hasPermissionTo('Delete Event')) {
                return Redirect::to('/error');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
