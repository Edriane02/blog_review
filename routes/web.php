<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/post/{id}', [HomeController::class, 'viewPost'])->name('viewPost');
Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contactUs');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('maintenance', [HomeController::class, 'maintenancePage'])->name('maintenancePage');
Route::get('profile', [HomeController::class, 'clientProfile'])->name('clientProfile');
Route::get('edit-profile', [HomeController::class, 'clientEditProfile'])->name('clientEditProfile');
Route::get('change-password', [HomeController::class, 'clientChangePassword'])->name('clientChangePassword');
Route::get('latest-reviews', [HomeController::class, 'latestReviewsPage'])->name('latestReviewsPage');
Route::get('reviewer', [HomeController::class, 'reviewerAuthorPage'])->name('reviewerAuthorPage');
Route::get('category', [HomeController::class, 'categoryResultsPage'])->name('categoryResultsPage');
Route::get('search', [HomeController::class, 'searchResultsPage'])->name('searchResultsPage');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', function () {
        return view('admin-pages.index');
    })->middleware('isAdmin')->name('dashboard');
});




Route::controller(RegisterController::class)->group(function(){

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerUser')->name('registerUser');

});

Route::controller(LoginController::class)->group(function(){

    Route::get('user/login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('loginAction');
    Route::get('logout', 'logout')->name('logout');
    Route::get('admin/login', 'adminLogin')->name('adminLogin');

});


Route::controller(AdminController::class)->group(function(){
    Route::get('admin/posts', 'allPosts')->middleware('auth', 'isAdmin')->name('posts');
    Route::get('admin/post/new', 'newPost')->middleware('auth', 'isAdmin')->name('newPost');
<<<<<<< HEAD
    Route::post('admin/upload-post', 'uploadPost')->middleware('auth', 'isAdmin')->name('uploadPost'); 
=======
    Route::post('admin/upload-post', 'uploadPost')->middleware('auth', 'isAdmin')->name('uploadPost');
    Route::get('admin/post/edit', 'editPost')->middleware('auth', 'isAdmin')->name('editPost');
>>>>>>> CFranlin
});

Route::controller(ReviewerController::class)->group(function(){
    Route::get('admin/reviewer', 'reviewerPage')->middleware('auth', 'isAdmin')->name('reviewer');
    Route::post('admin/add-reviewer', 'addReviewer')->middleware('auth', 'isAdmin')->name('addReviewer');
    Route::post('admin/edit-reviewer', 'editReviewer')->middleware('auth', 'isAdmin')->name('editReviewer');
    Route::delete('admin/reviewer/destroy/{id}', 'deleteReviewer')->middleware('auth')->name('deleteReviewer');
});

Route::controller(TagController::class)->group(function(){
    Route::get('admin/tags', 'tagsPage')->middleware('auth', 'isAdmin')->name('tags');
    Route::post('admin/add-tag', 'addTag')->middleware('auth', 'isAdmin')->name('addTag');
    Route::post('admin/edit-tag', 'editTag')->middleware('auth', 'isAdmin')->name('editTag');
    Route::delete('admin/tag/destroy/{id}', 'deleteTag')->middleware('auth')->name('deleteTag');
});

Route::controller(PostsController::class)->group(function(){
    Route::get('admin/posts', 'postsPage')->middleware('auth', 'isAdmin')->name('posts');
    // edit here
    Route::delete('admin/post/destroy/{id}', 'deletePost')->middleware('auth')->name('deletePost');
});





