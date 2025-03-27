<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Tags;
use App\Models\Contact;
use App\Models\FeaturedAuthor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
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

        // Get featured author (if any)
        $featuredAuthor = FeaturedAuthor::where('status', 'Featured')->latest()->first();
        
        return view('client-pages.home', compact('featuredBooks', 'latestBooks', 'tags', 'featuredAuthor'));
    }

    public function viewPost($id)
    {
        // For "Browse by Tags" section
        $tags = Tags::all();

        // Find the book by ID and load its relations
        $book = Books::with(['bookTag', 'reviews.reviewer'])->findOrFail($id); // Load reviews with their reviewer

        return view('client-pages.view-post', compact('book', 'tags'));
    }

    public function viewFeaturedAuthor($id)
    {
        $author = FeaturedAuthor::findOrFail($id);

        $tags = Tags::all();
        
        return view('client-pages.view-featured-author', compact('author', 'tags'));
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

    public function maintenanceClientPage()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.maintenance', compact('tags'));
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
        $searchQuery = trim($request->input('query')); // Sanitize input
        $tags = Tags::all(); // Fetch all available tags

        // Check if search query is empty
        if (empty($searchQuery)) {
            return view('client-pages.search-results', [
                'errorMessage' => 'It looks like the search box was empty. Try entering a keyword.',
                'books' => Books::whereRaw('0=1')->paginate(10),
                'tags' => $tags,
                'searchQuery' => $searchQuery
            ]);
        }

        // Limit query length to prevent abuse
        if (strlen($searchQuery) > 100) {
            return view('client-pages.search-results', [
                'errorMessage' => 'Search query is too long. Please enter a shorter keyword.',
                'books' => Books::whereRaw('0=1')->paginate(10),
                'tags' => $tags,
                'searchQuery' => $searchQuery
            ]);
        }

        // Escape special characters for LIKE search
        $searchQuery = addcslashes($searchQuery, '%_');

        // Perform the search safely
        $books = Books::where('title', 'LIKE', "%{$searchQuery}%")
            ->orWhere('book_author', 'LIKE', "%{$searchQuery}%")
            ->paginate(10);

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

    public function submitContactForm(Request $request)
    {
        // Check Honeypot: If filled, reject the request
        if (!empty($request->website_url)) {
            return back()->withErrors(['message' => 'Spam detected.']);
        }

        // Validate the request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // 'phone_number' => 'required|string|max:20',
            'phone_number' => ['required', 'regex:/^\+?[0-9]{7,15}$/'],
            'message' => 'required|string|max:1024',
        ]);

        // Check if a contact with the same email or phone number already exists
        $existingContact = Contact::where('email', $request->email)
            ->orWhere('phone_number', $request->phone_number)
            ->first();

        if ($existingContact) {
            throw ValidationException::withMessages([
                'email' => 'A contact with this email or phone number already exists.',
            ]);
        }

        DB::transaction(function () use ($request) {
            Contact::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'message' => $request->message,
            ]);
        });        

        return back()->with('success', 'Your message has been sent successfully.');
    }

    public function featuredAuthorsPage()
    {
        $featuredAuthors = FeaturedAuthor::orderBy('id', 'desc')->paginate(10);

        // Return view with data
        return view('client-pages.featured-authors', compact('featuredAuthors'));
    }




}