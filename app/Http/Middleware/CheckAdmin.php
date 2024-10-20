<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        // Check if the user is authenticated and is an admin
        if (Auth::guard('admin')->check()) {
            // User is authenticated as an admin
            return $next($request);
        }

        // User is not authenticated as an admin, redirect or show an error
        return redirect()->route('admin.login')->with('error', 'You must be logged in as an admin to access this page.');
    }
}
