<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    public function designation(){
        $designations = Designation::all();

        return view('management.designation', compact('designations'));
    }

    public function newDesignation(Request $request){
  // Validate incoming request
        $request->validate([
            'designation' => 'required|string|max:255'
        ]);

        DB::beginTransaction();

        try {
            // Check if designation already exists
            $existingDesignation = Designation::where('designation', $request->designation)
                ->first();

            if ($existingDesignation) {
                DB::rollBack();
                return back()->with('error', 'Designation already exists.');
            }


            // Create a new designation record
            $designation = new Designation;
            $designation->designation = $request->designation;
            $designation->save();

            DB::commit();
            return back()->with('success', 'Designation successfully added.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while adding the designation: ' . $e->getMessage());
        }
    }

    public function editDesignation(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'designation' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // Check if another designation with the same name (but different ID) already exists
            $existingDesignation = Designation::where('designation', $request->designation)
                ->where('id', '!=', $request->id)
                ->first();

            if ($existingDesignation) {
                DB::rollBack();
                return back()->with('error', 'Another Designation with the same name.');
            }

            // Find the existing reviewer
            $designation = Designation::findOrFail($request->id);


            // Update the reviewer information
            $designation->update([
                'designation' => $request->designation,
            ]);

            // Commit the transaction
            DB::commit();

            return back()->with('success', 'Designation updated successfully.');

        } catch (\Exception $e) {
            // Roll back in case of error
            DB::rollBack();
            return back()->with('error', 'An error occurred while updating the designation: ' . $e->getMessage());
        }
    }

    public function deleteDesignation(string $id)
    {
        DB::beginTransaction();

        try {
            $designation = Designation::findOrFail($id);

            $designation->delete();
            DB::commit();

            return redirect()->route('designation')->with('success', 'Designation deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while deleting the designation: ' . $e->getMessage());
        }
    }

}
