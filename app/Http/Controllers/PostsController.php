<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\BookTag;
use App\Models\Books;

class PostsController extends Controller
{
    public function postsPage()
    {
        $posts = Reviews::with(['reviewer', 'book']) // Load reviewer and book relationships
            ->orderBy('created_at', 'desc') // Ordering by date
            ->get();
        return view('admin-pages.posts', compact('posts'));
    }

    public function deletePost(string $id)
    {
        // Find the review by ID
        $review = Reviews::findOrFail($id);

        // Get the associated book ID
        $bookId = $review->book_id;

        // Delete the review
        $review->delete();

        // Check if there are no more reviews for the book, and delete the book
        $remainingReviews = Reviews::where('book_id', $bookId)->count();
        if ($remainingReviews == 0) {
            $book = Books::findOrFail($bookId);

            // Delete associated tags
            BookTag::where('book_id', $bookId)->delete();

            // Delete the uploaded image banner from the storage
            if ($book->banner && \Storage::disk('public')->exists($book->banner)) {
                \Storage::disk('public')->delete($book->banner);
            }

            // Finally, delete the book itself
            $book->delete();
        }

        // Redirect with a success message
        return redirect()->route('posts')->with('success', 'Post deleted successfully.');
    }


}