<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if not logged in, redirect to admin login
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        //if logged in but not admin, deny access
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Uanthorized');
        }   

        //if user is admin, allow access
        return $next($request);
    }
}
