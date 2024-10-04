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

    public function home()
{
    // Get all books with 'Featured Review' tag
    $featuredBooks = Books::whereHas('bookTag', function ($query) {
                            $query->where('book_tag', 'Featured Review');})
                            ->with(['bookTag', 'reviewer'])
                            ->orderBy('created_at')
                            ->get();

    // Get the latest 3 reviews
    $latestBooks = Books::latest()->take(3)->with(['bookTag', 'reviewer'])->get();

    return view('dashboard.home', compact('featuredBooks', 'latestBooks'));
}
        
    public function adminHome(){
        return view('dashboard.index');
    }

   
}
