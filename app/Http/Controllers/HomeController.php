<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function ___construct()
    {
        $this->middleware('auth');
    }

    public function home(){

        $books = Books::with(['bookTag', 'reviewer'])->get();
                                        

            return view('dashboard.home', compact('books'));
        }
        
    public function adminHome(){
        return view('dashboard.index');
    }

   
}
