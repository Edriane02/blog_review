<?php
namespace App\Http\Controllers;
use App\Models\FeaturedAuthor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeaturedAuthorController extends Controller
{
    public function index()
    {
        $authors = FeaturedAuthor::orderBy('created_at', 'desc')->get();
        return view('admin-pages.feat-author', compact('authors'));
    }
    
    public function create()
    {
        return view('admin-pages.create-feat-author');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'img_banner' => 'nullable|image',
            'headline' => 'nullable|string|max:255',
            'body_text' => 'nullable|array',
            'body_text.*' => 'nullable|string',
            'status' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        
        try {
            // Check if attempting to create a featured author when one already exists
            if ($request->status === 'Featured' && FeaturedAuthor::where('status', 'Featured')->exists()) {
                return back()->with('error', 'Only one author can be featured at a time. Please update the existing featured author or change the visibility status.');
            }
            
            $bannerPath = null;
            if ($request->hasFile('img_banner')) {
                $bannerPath = $request->file('img_banner')->store('author_banners', 'public');
            }
            
            $bodyContent = '';
            
            if ($request->has('body_text') && is_array($request->body_text)) {
                // Filter out empty entries and combine with a separator
                $filteredTexts = array_filter($request->body_text, function($value) {
                    return $value !== null && trim($value) !== '';
                });
                
                if (!empty($filteredTexts)) {
                    $bodyContent = implode('<!--section_break-->', $filteredTexts);
                }
            }
            
            FeaturedAuthor::create([
                'author_name' => $request->author_name,
                'img_banner' => $bannerPath,
                'headline' => $request->headline,
                'body_text' => $bodyContent,
                'status' => $request->status,
            ]);
            
            DB::commit();
            return redirect()->route('featured_authors.index')->with('success', 'Featured Author added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while creating featured author: ' . $e->getMessage());
        }
    }
    
    public function edit(FeaturedAuthor $featuredAuthor)
    {
        if (!empty($featuredAuthor->body_text)) {
            $featuredAuthor->body_text = explode('<!--section_break-->', $featuredAuthor->body_text);
        } else {
            $featuredAuthor->body_text = [''];
        }
        
        return view('admin-pages.edit-feat-author', compact('featuredAuthor'));
    }
    
    public function update(Request $request, FeaturedAuthor $featuredAuthor)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'img_banner' => 'nullable|image',
            'headline' => 'nullable|string|max:255',
            'body_text' => 'nullable|array',
            'body_text.*' => 'nullable|string',
            'status' => 'required|string|max:255',
        ]);
        
        DB::beginTransaction();
        
        try {
            // Check if attempting to change status to Featured when another author is already featured
            if ($request->status === 'Featured' && $featuredAuthor->status !== 'Featured') {
                $existingFeatured = FeaturedAuthor::where('status', 'Featured')->exists();
                if ($existingFeatured) {
                    return back()->with('error', 'Only one author can be featured at a time. Please update the existing featured author first.');
                }
            }
            
            // Update image if provided
            if ($request->hasFile('img_banner')) {
                // Delete old banner if exists
                if ($featuredAuthor->img_banner) {
                    Storage::disk('public')->delete($featuredAuthor->img_banner);
                }
                $bannerPath = $request->file('img_banner')->store('author_banners', 'public');
            } else {
                $bannerPath = $featuredAuthor->img_banner;
            }
            
            $bodyContent = '';
            
            if ($request->has('body_text') && is_array($request->body_text)) {
                // Filter out empty entries and combine with a separator
                $filteredTexts = array_filter($request->body_text, function($value) {
                    return $value !== null && trim($value) !== '';
                });
                
                if (!empty($filteredTexts)) {
                    $bodyContent = implode('<!--section_break-->', $filteredTexts);
                }
            }
            
            $featuredAuthor->update([
                'author_name' => $request->author_name,
                'img_banner' => $bannerPath,
                'headline' => $request->headline,
                'body_text' => $bodyContent,
                'status' => $request->status,
            ]);
            
            DB::commit();
            return redirect()->route('featured_authors.index')->with('success', 'Featured Author updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while updating featured author: ' . $e->getMessage());
        }
    }
    
    public function destroy(FeaturedAuthor $featuredAuthor)
    {
        // Delete image if exists
        if ($featuredAuthor->img_banner) {
            Storage::disk('public')->delete($featuredAuthor->img_banner);
        }
        $featuredAuthor->delete();
        return redirect()->route('featured_authors.index')->with('success', 'Featured Author deleted successfully.');
    }
}