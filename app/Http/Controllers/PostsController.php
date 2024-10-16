<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reviews;
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
        $post = Reviews::findOrFail($id);
        $post->delete();
        return redirect()->route('posts')->with('success', 'Post deleted successfully.');
    }
}