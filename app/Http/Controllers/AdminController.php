<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\BookTag;
use App\Models\Reviews;
use App\Models\Reviewer;
use App\Models\Tags;
use App\Models\AdminUser;
use App\Models\AdminUserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function allPosts(){
        $books = Books::with(['reviews', 'bookTag'])->get();
                         
        return view('admin-pages.posts', compact('books'));
    }

    public function newPost(){

        $reviewers = Reviewer::all();  // Fetch all reviewers
        $tags = Tags::all();  // Fetch all tags

        return view('admin-pages.newPost', compact('reviewers', 'tags'));
    }

    // ===== WORKING/TESTED ===== //
    public function uploadPost(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'banner' => 'nullable|image',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'book_author' => 'nullable|string|max:255',
            'genre' => 'nullable|string|max:255',
            'pages' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'amazon_link' => 'nullable|string',
            'barnes_noble_link' => 'nullable|string',
            'review_title' => 'nullable|string|max:255',
            'review' => 'nullable|array',
            'review.*' => 'nullable|string',
            'reviewer' => 'nullable|array',
            'reviewer.*' => 'nullable|string|max:255',
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
                'book_author' => $request->book_author,
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
                        'review_title' => $request->review_title,
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

            return redirect()->route('posts')->with('success', 'Post successfully uploaded.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while uploading the post: ' . $e->getMessage());
        }
    }

    public function editPost($id){

        $books = Books::with('reviews', 'bookTag')->findOrFail($id);
        $reviewers = Reviewer::all();  // Fetch all reviewers
        $tags = Tags::all();

        return view('admin-pages.editPost', compact('books', 'reviewers', 'tags'));
    } 
    

    // ===== WORKING/TESTED ===== //
    public function updatePost(Request $request, $id)
{
    // Validate incoming request
    $request->validate([
        'banner' => 'nullable|image',
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'book_author' => 'nullable|string|max:255',
        'genre' => 'nullable|string|max:255',
        'pages' => 'nullable|string|max:255',
        'publisher' => 'nullable|string|max:255',
        'amazon_link' => 'nullable|string',
        'barnes_noble_link' => 'nullable|string',
        'review_title' => 'nullable|string|max:255',
        'review' => 'nullable|array',
        'review.*' => 'nullable|string',
        'reviewer' => 'nullable|array',
        'reviewer.*' => 'nullable|string|max:255',
        'book_tag' => 'nullable|array',
        'book_tag.*' => 'nullable|string|max:255',
    ]);

    DB::beginTransaction();

    try {
        // Find the existing book by ID
        $book = Books::findOrFail($id);

        // Handle file upload if a new banner is present
        if ($request->hasFile('banner')) {
            // Delete the old banner if exists
            if ($book->banner) {
                \Storage::disk('public')->delete($book->banner);
            }
            $book->banner = $request->file('banner')->store('banners', 'public');
        }

        // Update the book record
        $book->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'book_author' => $request->book_author,
            'genre' => $request->genre,
            'pages' => $request->pages,
            'publisher' => $request->publisher,
            'amazon_link' => $request->amazon_link,
            'barnes_noble_link' => $request->barnes_noble_link,
        ]);

        // Delete old reviews and add new ones if provided
        if ($request->reviewer != null && $request->review != null) {
            // Delete old reviews for this book
            Reviews::where('book_id', $book->id)->delete();

            foreach ($request->reviewer as $index => $reviewer) {
                Reviews::create([
                    'book_id' => $book->id,
                    'reviewer' => $reviewer,
                    'review_title' => $request->review_title,
                    'review' => $request->review[$index],
                ]);
            }
        }

        // Delete old book tags and add new ones
        if ($request->book_tag != null) {
            // Delete old tags for this book
            BookTag::where('book_id', $book->id)->delete();

            foreach ($request->book_tag as $tag) {
                BookTag::create([
                    'book_id' => $book->id,
                    'book_tag' => $tag,
                ]);
            }
        }

        DB::commit();

        return redirect()->route('posts')->with('success', 'Post successfully updated.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'An error occurred while updating the post: ' . $e->getMessage());
    }
}

public function unauthorizedPage(){
                     
    return view('admin-pages.unauthorized');
}

public function profilePage(){
    $adminProfile = AdminUserProfile::where('id', Auth::id())->first();

    return view('admin-pages.profile', compact('adminProfile'));
}

public function updateProfile(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'suffix' => 'nullable|string|max:255',
        'email' => 'required|email|unique:admin_users,email,' . auth()->user()->id,
    ]);

    DB::beginTransaction();

    try {
        // Update admin user email
        $adminUser = AdminUser::where('id', auth()->id())->first();
        $adminUser->email = $request->email;
        $adminUser->save();

        // Update admin user profile
        $adminUserProfile = AdminUserProfile::where('user_id', $adminUser->user_id)->first();
        $adminUserProfile->fname = $request->first_name;
        $adminUserProfile->mname = $request->middle_name;
        $adminUserProfile->lname = $request->last_name;
        $adminUserProfile->suffix = $request->suffix;
        $adminUserProfile->save();

        DB::commit();

        return back()->with('success', 'Profile updated successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}

public function changePasswordPage(){
    

    return view('admin-pages.change-password');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $adminUser = auth()->user(); // Get the currently authenticated admin

    // Check if the provided current password matches the one in the database
    if (!Hash::check($request->current_password, $adminUser->password)) {
        return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    DB::beginTransaction();

    try {
        // Update with the new password
        $adminUser->password = Hash::make($request->new_password);
        $adminUser->save();

        DB::commit();
        return redirect()->route('changePasswordPage')->with('success', 'Password changed successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => 'An error occurred while updating the password.']);
    }
}


}