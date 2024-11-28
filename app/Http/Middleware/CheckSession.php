<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    public function handle(Request $request, Closure $next)
    {
        // Check if session data exists
        if (!session('user') || !session('userToken')) {
            // If no session data is found, redirect to the login page
            return redirect()->route('login')->with('error', 'You need to be logged in.');
        }

        // Continue to the next request if the session is valid
        return $next($request);
    }
}