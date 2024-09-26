<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function allPosts(){
        return view('admin-pages.posts');
    }

}