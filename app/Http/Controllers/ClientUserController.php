<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use App\Models\ClientUser;
use App\Models\ClientUserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ClientUserController extends Controller
{
    public function clientProfile()
    {
        // For search: tag suggestion
        $tags = Tags::all();

        $clientProfile = ClientUserProfile::where('id', Auth::id())->first();

        return view('client-pages.profile', compact('tags', 'clientProfile'));
    }

    public function clientEditProfile()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('adminDashboard')->withErrors(['error' => 'Admins cannot access client profile pages.']);
        }

        // For search: tag suggestion
        $tags = Tags::all();

        // Fetch the current authenticated user's profile
        $clientProfile = ClientUserProfile::where('id', Auth::id())->first();

        return view('client-pages.edit-profile', compact('tags', 'clientProfile'));

    }

    public function clientUpdateProfile(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'email' => 'required|email|unique:client_users,email,' . auth()->id(),
        ]);

        DB::beginTransaction();

        try {
            // Update client user email
            $clientUser = ClientUser::where('id', auth()->id())->first();
            $clientUser->email = $request->email;
            $clientUser->save();

            // Update client user profile
            $clientUserProfile = ClientUserProfile::where('id', auth()->id())->first();
            $clientUserProfile->fname = $request->fname;
            $clientUserProfile->mname = $request->mname;
            $clientUserProfile->lname = $request->lname;
            $clientUserProfile->suffix = $request->suffix;
            $clientUserProfile->save();

            DB::commit();

            return redirect()->route('clientProfile')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function clientChangePassword()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('adminDashboard')->withErrors(['error' => 'Admins cannot access client profile pages.']);
        }

        // For search: tag suggestion
        $tags = Tags::all();

        return view('client-pages.change-password', compact('tags'));
    }

    public function clientChangePwdAction(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $clientUser = auth()->user(); // Get the currently authenticated admin

        // Check if the provided current password matches the one in the database
        if (!Hash::check($request->current_password, $clientUser->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        DB::beginTransaction();

        try {
            // Update with the new password
            $clientUser->password = Hash::make($request->new_password);
            $clientUser->save();

            DB::commit();
            return redirect()->route('clientProfile')->with('success', 'Password changed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'An error occurred while updating the password.']);
        }
    }
}
