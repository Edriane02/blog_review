<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClientUsersController extends Controller
{
    public function clientUsersPage()
    {

        return view('admin-pages.client-users');
    }

    // Delete a User (Client)
    public function deleteClientUser(string $id)
    {
        
    }


}