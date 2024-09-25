<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
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
             return redirect()->route('index');
        }else{
            return back()->with('error', 'Wrong Email or Password');
        }
    }

    public function logout(Request $request){
        
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            
            return redirect()->route('login');
    }
}
