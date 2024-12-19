<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $designation = $user->adminUserProfile->designationType->designation;

            // Check if user is an admin (excluding management)
            if ($designation == true) {
                return $next($request);
            }

            return redirect()->route('unauthorizedPage');
        }

        return redirect()->route('home');
    }
}
