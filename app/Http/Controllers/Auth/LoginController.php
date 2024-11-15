<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUserProfile;
use App\Models\ClientUserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');  
    }

    public function login()
    {
        return view('auth.login');
    }

    public function adminLogin()
    {
        return view('auth.admin-login');
    }


    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ])->validate();

        $credentials = $request->only('email', 'password');

        // Attempt to authenticate as a client using the 'client' guard
        if (Auth::guard('client')->attempt($credentials)) {
            // Retrieve the client's profile
            $profile = ClientUserProfile::where('user_id', Auth::guard('client')->user()->user_id)->first();

            if ($profile) {
                // Store full name in the session
                session([
                    'client_fname' => $profile->fname,
                    'client_lname' => $profile->lname,
                ]);                

            } else {
                return back()->with('error', 'Profile not found for this user.');
            }

            return redirect()->route('home');
        }else{
            return back()->with('error', 'Wrong Email or Password.');
        }
    }


    public function adminLoginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ])->validate();

        $credentials = $request->only('email', 'password');

        // Attempt to authenticate as an admin using the 'admin' guard
        if (Auth::guard('admin')->attempt($credentials)) {
            // Retrieve the admin's profile
            $profile = AdminUserProfile::where('user_id', Auth::guard('admin')->user()->user_id)->first();

            if ($profile) {
                // Store full name in the session
                session([
                    'admin_fname' => $profile->fname,
                    'admin_lname' => $profile->lname,
                ]);                

            } else {
                return back()->with('error', 'Profile not found for this user.');
            }

            return redirect()->route('dashboard');
        }else{
            return back()->with('error', 'Wrong Email or Password.');
        }
    }


    public function logout(Request $request){
        
        Auth::guard('client')->logout();

        $request->session()->invalidate();
        
        return redirect()->route('home');
}

    public function adminLogout(Request $request){
        
            Auth::guard('admin')->logout();

            $request->session()->invalidate();
            
            return redirect()->route('adminLogin');
    }
}
