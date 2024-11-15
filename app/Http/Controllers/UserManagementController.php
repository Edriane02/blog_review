<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClientUser;
use App\Models\ClientUserProfile;
use App\Models\AdminUser;
use App\Models\AdminUserProfile;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;



class UserManagementController extends Controller
{
    public function allUsersPage()
    {

        return view('management.all-users');
    }

    public function clientUsersPage()
    {
        $client = ClientUserProfile::all();
    

        return view('management.user-client', compact('client'));
    }

    public function adminUsersPage()
    {
        $admin = AdminUserProfile::all();
        $designation = Designation::all();

        return view('management.user-admin', compact('admin', 'designation'));
    }

    public function newClientUser(Request $request)
    {
        DB::beginTransaction();

            // Check if user already exists by employee id, and email
            $existingUser = ClientUser::where('user_id', $request->userId)
                                ->where('email', $request->email)
                                ->first();

            if ($existingUser) {
                DB::rollBack();
                return back()->with('error', 'User already exists.');
            }

            $userId = IdGenerator::generate(['table' => 'client_users', 'field' => 'user_id', 'length' => 10, 'prefix' => '09']);

            $user = ClientUser::create([
                'user_id' => $userId,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            ClientUserProfile::create([
                'user_id' => $user->user_id,
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'suffix' => $request->suffix
            ]);

            DB::commit();


            return redirect()->back();
    }

    public function newAdminUser(Request $request)
    {
        DB::beginTransaction();

            // Check if user already exists by employee id, and email
            $existingUser = AdminUser::where('user_id', $request->userId)
                                ->where('email', $request->email)
                                ->first();

            if ($existingUser) {
                DB::rollBack();
                return back()->with('error', 'User already exists.');
            }

            $userId = IdGenerator::generate(['table' => 'admin_users', 'field' => 'user_id', 'length' => 10, 'prefix' => '09']);
            

            $user = AdminUser::create([
                'user_id' => $userId,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            AdminUserProfile::create([
                'user_id' => $user->user_id,
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'user_type_id' => $request->des_type,
                'suffix' => $request->suffix
            ]);

            DB::commit();


            return redirect()->back();
    }



    // Delete a User (Client)
    public function deleteClientUser(string $id)
    {
        DB::beginTransaction();

        try {
            $client = ClientUserProfile::findOrFail($id);
                    
            $client->clientUser()->delete();
            // Delete the photo from storage if it exists

            $client->delete();
            DB::commit();

            return redirect()->route('client-users')->with('success', 'Client deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while deleting the Client: ' . $e->getMessage());
        }
    }

    public function deleteAdminUser(string $id)
    {
        DB::beginTransaction();

        try {
            $admin = AdminUserProfile::findOrFail($id);

            $admin->adminUser()->delete();
            // Delete the photo from storage if it exists

            $admin->delete();
            DB::commit();

            return redirect()->route('admin-users')->with('success', 'Admin deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while deleting the Admin: ' . $e->getMessage());
        }
    }


}