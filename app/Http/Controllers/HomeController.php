<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
{
    // Get all books with 'Featured Review' tag
    $featuredBooks = Books::whereHas('bookTag', function ($query) {
        $query->where('book_tag', 'Featured Review');
    })
    ->with(['bookTag', 'reviews.reviewer']) // Use 'reviews' instead of 'reviewer'
    ->orderBy('created_at')
    ->get();

    // Get the latest 3 books with their reviews and reviewers
    $latestBooks = Books::latest()->take(3)->with(['bookTag', 'reviews.reviewer'])->get();

    return view('dashboard.home', compact('featuredBooks', 'latestBooks'));
}



public function viewPost($id)
{
    // Find the book by ID and load its relations
    $book = Books::with(['bookTag', 'reviews.reviewer'])->findOrFail($id); // Load reviews with their reviewer

    return view('dashboard.viewpost', compact('book'));
}






        
    public function adminHome(){
        return view('dashboard.index');
    }

   
}
