<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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

        return view('client-pages.home', compact('featuredBooks', 'latestBooks'));
    }

    public function viewPost($id)
    {
        // Find the book by ID and load its relations
        $book = Books::with(['bookTag', 'reviews.reviewer'])->findOrFail($id); // Load reviews with their reviewer

        return view('client-pages.view-post', compact('book'));
    }

    public function adminHome()
    {
        return view('admin-pages.index');
    }

    public function contactUs()
    {
        return view('client-pages.contact-us');
    }

    public function aboutUs()
    {
        return view('client-pages.about-us');
    }

    public function maintenancePage()
    {
        return view('client-pages.maintenance');
    }

    public function clientProfile()
    {
        return view('client-pages.profile');
    }

    public function clientEditProfile()
    {
        return view('client-pages.edit-profile');
    }

    public function clientChangePassword()
    {
        return view('client-pages.change-password');
    }

    public function latestReviewsPage()
    {
        // Get the latest 10 books
        $latestBooks = Books::latest()->take(10)->with(['bookTag'])->get();

        return view('client-pages.latest-reviews', compact('latestBooks'));
    }

    public function reviewerAuthorPage()
    {
        return view('client-pages.reviewer-author');
    }

    public function categoryResultsPage()
    {
        return view('client-pages.category-results');
    }

    public function searchResultsPage()
    {
        return view('client-pages.search-results');
    }



}