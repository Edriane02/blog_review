<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewerController;
use App\Models\Reviewer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.home'); // Assuming 'home' is your homepage view
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', function () {
        return view('dashboard.index');
    })->middleware('isAdmin')->name('dashboard');
});



Route::controller(RegisterController::class)->group(function(){

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerUser')->name('registerUser');

});

Route::controller(LoginController::class)->group(function(){

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('loginAction');
    Route::get('logout', 'logout')->name('logout');
    Route::get('admin/login', 'adminLogin')->name('adminLogin');


});

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/posts', 'allPosts')->middleware('auth', 'isAdmin')->name('posts');
    Route::get('admin/post/new', 'newPost')->middleware('auth', 'isAdmin')->name('newPost');

});


Route::controller(ReviewerController::class)->group(function(){
    Route::get('admin/reviewer', 'reviewerPage')->middleware('auth', 'isAdmin')->name('reviewer');
    Route::post('admin/add-reviewer', 'addReviewer')->middleware('auth', 'isAdmin')->name('addReviewer');
    Route::post('admin/edit-reviewer', 'editReviewer')->middleware('auth', 'isAdmin')->name('editReviewer');
    Route::delete('admin/reviewer/destroy/{id}', 'deleteReviewer')->middleware('auth')->name('deleteReviewer');
});




