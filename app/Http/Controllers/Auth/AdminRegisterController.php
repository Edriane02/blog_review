<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdminUserProfile;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AdminRegisterController extends Controller
{
    public function registerAdmin()
    {
        return view('auth.admin-register');
    }

    public function registerUserAdmin(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::beginTransaction();

        try {
            $userId = IdGenerator::generate(['table' => 'admin_users', 'length' => 10, 'prefix' => '09']);

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
                'suffix' => $request->suffix,
                'user_type_id' => '0',
            ]);

            DB::commit();

            return redirect()->route('designation')->with('success', 'Admin registered successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
