<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function home()
    {
        // For "Browse by Tags" section
        $tags = Tags::all();

        // Get all books with 'Featured Review' tag
        $featuredBooks = Books::whereHas('bookTag', function ($query) {
            $query->where('book_tag', 'Featured Review');
        })
            ->with(['bookTag', 'reviews.reviewer']) // Use 'reviews' instead of 'reviewer'
            ->orderBy('created_at')
            ->get();

        // Get the latest 3 books with their reviews and reviewers
        $latestBooks = Books::latest()->take(3)->with(['bookTag', 'reviews.reviewer'])->get();

        return view('client-pages.home', compact('featuredBooks', 'latestBooks', 'tags'));
    }

    public function viewPost($id)
    {
        // For "Browse by Tags" section
        $tags = Tags::all();

        // Find the book by ID and load its relations
        $book = Books::with(['bookTag', 'reviews.reviewer'])->findOrFail($id); // Load reviews with their reviewer

        return view('client-pages.view-post', compact('book', 'tags'));
    }

    public function adminHome()
    {
        return view('admin-pages.index');
    }

    public function contactUs()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.contact-us', compact('tags'));
    }

    public function aboutUs()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.about-us', compact('tags'));
    }

    public function maintenancePage()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.maintenance', compact('tags'));
    }

    public function clientProfile()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.profile', compact('tags'));
    }

    public function clientEditProfile()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.edit-profile', compact('tags'));
    }

    public function clientChangePassword()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.change-password', compact('tags'));
    }

    public function latestReviewsPage()
    {
        // // For search: tag suggestion
        $tags = Tags::all();
        // Get the latest 10 books
        $latestBooks = Books::latest()->take(10)->with(['bookTag'])->get();

        return view('client-pages.latest-reviews', compact('latestBooks', 'tags'));
    }

    public function reviewerAuthorPage()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.reviewer-author', compact('tags'));
    }

    public function categoryResultsPage()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.category-results', compact('tags'));
    }

    public function searchResultsPage()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.search-results', compact('tags'));
    }

    



}