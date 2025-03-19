<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tags;
use App\Models\BookTag;

class TagController extends Controller
{
    public function tagsPage()
    {
        $tags = Tags::orderBy('created_at', 'desc')->get();

        return view('admin-pages.tags', compact('tags'));
    }

    public function addTag(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // Check if tag already exists
            $existingtag = Tags::where('tag', $request->tag)
                ->first();

            if ($existingtag) {
                DB::rollBack();
                return back()->with('error', 'Tag already exists.');
            }

            // Create a new tag record
            $tag = new Tags;
            $tag->tag = $request->tag;
            $tag->save();

            DB::commit();
            return back()->with('success', 'Tag successfully added.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while adding the tag: ' . $e->getMessage());
        }
    }

    public function editTag(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // Check if another tag with the same name (but different ID) already exists
            $existingtag = Tags::where('tag', $request->tag)
                ->where('id', '!=', $request->id)
                ->first();

            if ($existingtag) {
                DB::rollBack();
                return back()->with('error', 'Another Tag with the same name.');
            }

            // Find the existing tag
            $tag = Tags::findOrFail($request->id);

            // Update tag information
            $tag->update([
                'tag' => $request->tag
            ]);

            // Commit the transaction
            DB::commit();

            return back()->with('success', 'Tag updated successfully.');

        } catch (\Exception $e) {
            // Roll back in case of error
            DB::rollBack();
            return back()->with('error', 'An error occurred while updating the tag: ' . $e->getMessage());
        }
    }

    public function deleteTag(string $id)
    {
        $tag = Tags::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags')->with('success', 'Tag deleted successfully.');
    }


}