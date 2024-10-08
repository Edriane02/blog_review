<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\BookTag;
use App\Models\Reviews;
use App\Models\Reviewer;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function allPosts(){
        return view('admin-pages.posts');
    }

    public function newPost(){

        $reviewers = Reviewer::all();  // Fetch all reviewers
        $tags = Tags::all();  // Fetch all tags

        return view('admin-pages.new-post', compact('reviewers', 'tags'));
    }

    public function uploadPost(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'banner' => 'nullable|image|max:2048', // Assumes banner is an image
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'genre' => 'nullable|string|max:255',
            'pages' => 'nullable|integer',
            'publisher' => 'nullable|string|max:255',
            'amazon_link' => 'nullable|string|max:255',
            'barnes_noble_link' => 'nullable|string|max:255',
            'review' => 'nullable|array',
            'review.*' => 'nullable|string', // Ensure reviews are provided
            'reviewer' => 'nullable|array',
            'reviewer.*' => 'nullable|string|max:255', // Reviewers should exist in the DB
            'book_tag' => 'nullable|array',
            'book_tag.*' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // Handle file upload if banner is present
            $bannerPath = null;
            if ($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('banners', 'public');
            }

            // Insert book record
            $book = Books::create([
                'banner' => $bannerPath,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'genre' => $request->genre,
                'pages' => $request->pages,
                'publisher' => $request->publisher,
                'amazon_link' => $request->amazon_link,
                'barnes_noble_link' => $request->barnes_noble_link,
            ]);

            if ($request->reviewer != null && $request->review != null) {
                foreach ($request->reviewer as $index => $reviewer) {
                    Reviews::create([
                        'book_id' => $book->id,
                        'reviewer' => $reviewer, // Assuming 'reviewer_id' is the foreign key in Reviews table
                        'review' => $request->review[$index],
                    ]);
                }
            }

            foreach ($request->book_tag as $tag) {
                BookTag::create([
                    'book_id' => $book->id,
                    'book_tag' => $tag,
                    ]);
                }       

            DB::commit();

            return back()->with('success', 'Post successfully uploaded.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while uploading the Post: ' . $e->getMessage());
        }
    }



    

}