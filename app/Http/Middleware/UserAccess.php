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
        if(Auth::check()) {
            $user = Auth::user();

            if($user->adminUserProfile->designationType->designation == 'admin' || $user->adminUserProfile->designationType->designation == 'editor') {
                
                return $next($request);
                
            } else {

                return redirect()->route('unauthorizedPage');
            }
        } else {
            return redirect('login');
        }
    }
}
