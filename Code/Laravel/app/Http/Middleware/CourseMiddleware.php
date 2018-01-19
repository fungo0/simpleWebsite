<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CourseMiddleware
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
        if ($request->is('courses/create')) {
            //If speaker is creating a course
            if (!Auth::user()->hasPermissionTo('Create Course')) {
                return Redirect::to('/error');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('courses/*/edit')) {
            //If speaker is editing a course
            if (!Auth::user()->hasPermissionTo('Edit Course')) {
                return Redirect::to('/error');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) {
            //If speaker is deleting a course
            if (!Auth::user()->hasPermissionTo('Delete Course')) {
                return Redirect::to('/error');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
