<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Reviews;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function newPost(){
        return view('admin-pages.newPost');
    }

    

    public function uploadPost(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'post_id' => 'required|integer',
            'banner' => 'nullable|image|max:2048', // Assumes banner is an image
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'pages' => 'nullable|integer',
            'publisher' => 'nullable|string|max:255',
            'amazon_link' => 'nullable|url',
            'barnes_noble_link' => 'nullable|url',
            'reviews' => 'nullable|array',
            'reviews.*.reviewer' => 'nullable|string|max:255',
            'reviews.*.review' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string|max:255',
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
                'post_id' => $request->post_id,
                'banner' => $bannerPath,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'pages' => $request->pages,
                'publisher' => $request->publisher,
                'amazon_link' => $request->amazon_link,
                'barnes_noble_link' => $request->barnes_noble_link,
            ]);

            // Insert reviews related to the book
            if ($request->has('reviews')) {
                foreach ($request->reviews as $reviewData) {
                    if (!empty($reviewData['reviewer']) && !empty($reviewData['review'])) {
                        Reviews::create([
                            'book_id' => $book->id,
                            'reviewer' => $reviewData['reviewer'],
                            'review' => $reviewData['review'],
                        ]);
                    }
                }
            }

            // Insert tags related to the book
            if ($request->has('tags')) {
                foreach ($request->tags as $tagName) {
                    if (!empty($tagName)) {
                        // Check if the tag already exists
                        $tag = Tags::firstOrCreate(['tag' => $tagName]);

                        // Attach the tag to the book using the pivot table
                        $book->tags()->attach($tag->id);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'Post uploaded successfully!',
                'book' => $book,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    

}
