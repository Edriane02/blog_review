<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function ___construct()
    {
        $this->middleware('auth');
    }

    public function home(){
            return view('dashboard.home');
        }
        
    public function adminHome(){
        return view('dashboard.index');
    }

   
}
