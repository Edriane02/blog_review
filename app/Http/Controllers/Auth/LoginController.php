<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUserProfile;
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

        $email          = $request->email;
        $password       = $request->password;

        if (Auth::attempt(['email'=>$email,'password'=>$password]))
         {
            // Retrieve the user's profile
            $profile = AdminUserProfile::where('user_id', Auth::user()->user_id)->first();

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
            return back()->with('error', 'Wrong Email or Password');
        }
    }



    public function logout(Request $request){
        
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            
            return redirect()->route('adminLogin');
    }
}
