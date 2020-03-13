<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminOrganizerMiddleware
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
        if(Auth::check()) {
            if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Organizer')
            {
                return $next($request);
            }
            abort(404);
        }   
    }
}
