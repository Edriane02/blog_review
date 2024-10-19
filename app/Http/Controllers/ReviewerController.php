<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviewer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewerController extends Controller
{
    public function reviewerPage()
    {
        $reviewer = Reviewer::all();

        return view('admin-pages.reviewer', compact('reviewer'));
    }

    // ==== WORKING/TESTED ===== //
    public function addReviewer(Request $request)
    {
        // Validate incoming request
        $request->validate([
            // 'photo' => 'nullable|image|max:2048',
            'photo' => 'nullable|image',
            'reviewer_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            // Check if reviewer already exists
            $existingreviewer = Reviewer::where('reviewer_name', $request->reviewer_name)
                ->first();

            if ($existingreviewer) {
                DB::rollBack();
                return back()->with('error', 'Reviewer already exists.');
            }

            // Handle file upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('reviewers', 'public'); // Store in 'public/reviewers' directory
            }

            // Create a new reviewer record
            $reviewer = new Reviewer;
            $reviewer->photo = $photoPath; // Save the file path in the database
            $reviewer->reviewer_name = $request->reviewer_name;
            $reviewer->bio = $request->bio;
            $reviewer->save();

            DB::commit();
            return back()->with('success', 'Reviewer successfully added.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while adding the reviewer: ' . $e->getMessage());
        }
    }


    // ==== WORKING/TESTED ===== //
    public function editReviewer(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'photo' => 'nullable|image',
            'reviewer_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            // Check if another reviewer with the same name (but different ID) already exists
            $existingreviewer = Reviewer::where('reviewer_name', $request->reviewer_name)
                ->where('id', '!=', $request->id)
                ->first();

            if ($existingreviewer) {
                DB::rollBack();
                return back()->with('error', 'Another Reviewer with the same name.');
            }

            // Find the existing reviewer
            $reviewer = Reviewer::findOrFail($request->id);

            // Handle photo upload (optional)
            if ($request->hasFile('photo')) {
                // If the reviewer already has a photo, delete the old one
                if ($reviewer->photo) {
                    Storage::disk('public')->delete($reviewer->photo); // Delete old photo
                }

                // Store the new photo
                $photoPath = $request->file('photo')->store('reviewers', 'public');
            } else {
                // If no new photo is uploaded, retain the old one
                $photoPath = $reviewer->photo;
            }

            // Update the reviewer information
            $reviewer->update([
                'photo' => $photoPath,
                'reviewer_name' => $request->reviewer_name,
                'bio' => $request->bio,
            ]);

            // Commit the transaction
            DB::commit();

            return back()->with('success', 'Reviewer updated successfully.');

        } catch (\Exception $e) {
            // Roll back in case of error
            DB::rollBack();
            return back()->with('error', 'An error occurred while updating the reviewer: ' . $e->getMessage());
        }
    }

    // ==== WORKING/TESTED ===== //
    public function deleteReviewer(string $id)
    {
        DB::beginTransaction();

        try {
            $reviewer = Reviewer::findOrFail($id);

            // Optionally delete the photo from storage if it exists
            if ($reviewer->photo) {
                Storage::disk('public')->delete($reviewer->photo);
            }

            $reviewer->delete();
            DB::commit();

            return redirect()->route('reviewer')->with('success', 'Reviewer deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while deleting the reviewer: ' . $e->getMessage());
        }
    }
}
