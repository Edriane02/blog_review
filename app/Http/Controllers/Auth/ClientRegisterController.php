<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClientUserProfile;
use App\Models\ClientUser;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ClientRegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'email' => 'required|email|unique:client_users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::beginTransaction();

        try {
            $userId = IdGenerator::generate(['table' => 'client_users', 'field' => 'user_id','length' => 10, 'prefix' => '09']);

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

            return redirect()->route('login')->with('success', 'You have successfully registered!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}