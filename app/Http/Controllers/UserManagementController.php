<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserManagementController extends Controller
{
    public function allUsersPage()
    {

        return view('management.all-users');
    }

    public function clientUsersPage()
    {

        return view('management.user-client');
    }

    public function adminUsersPage()
    {

        return view('management.user-admin');
    }

    // Delete a User (Client)
    public function deleteClientUser(string $id)
    {
        
    }


}