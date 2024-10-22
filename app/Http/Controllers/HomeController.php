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
            ->orderBy('id', 'desc')
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

    public function reviewerReviews($reviewerId)
    {
        // Fetch the reviewer by ID
        $reviewer = \App\Models\Reviewer::findOrFail($reviewerId);

        // Get all reviews by this reviewer
        $reviews = \App\Models\Reviews::with('book') // Load the related books for each review
            ->where('reviewer', $reviewerId)
            ->paginate(10); // 10 results per page

        return view('client-pages.reviewer-author', compact('reviewer', 'reviews'));
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
        // For search: tag suggestion
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

    public function search(Request $request)
    {
        $searchQuery = $request->input('query'); // Get the search query from the form
        $tags = Tags::all(); // Fetch all available tags for suggestions

        // Search for books by title or author name and paginate the results (10 per page)
        $books = Books::where('title', 'LIKE', "%{$searchQuery}%")
                        ->orWhere('book_author', 'LIKE', "%{$searchQuery}%")
                        ->paginate(10); // Fetch 10 results per page

        return view('client-pages.search-results', compact('books', 'tags', 'searchQuery'));
    }

    public function categorySearch($tagId)
    {
        // Get the selected tag
        $tag = Tags::findOrFail($tagId);

        // Get books associated with the selected tag using a relationship
        $books = Books::whereHas('bookTag', function($query) use ($tag) {
            $query->where('book_tag', $tag->tag);
        })->paginate(10); // Fetch 10 results per page

        // Get all tags for the suggestion list
        $tags = Tags::all();

        // Pass data to the view
        return view('client-pages.category-results', compact('books', 'tags', 'tag'));
    }



}