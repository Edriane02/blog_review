<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ClientRegisterController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientUsersController;
use App\Http\Controllers\DesignationController;
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
Route::post('/contact-us', [HomeController::class, 'submitContactForm'])->name('contact.submit');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('maintenance', [HomeController::class, 'maintenancePage'])->name('maintenancePage');
Route::get('profile', [HomeController::class, 'clientProfile'])->name('clientProfile');
Route::get('edit-profile', [HomeController::class, 'clientEditProfile'])->name('clientEditProfile');
Route::get('change-password', [HomeController::class, 'clientChangePassword'])->name('clientChangePassword');
Route::get('latest-reviews', [HomeController::class, 'latestReviewsPage'])->name('latestReviewsPage');
Route::get('/reviewer/{id}/reviews', [HomeController::class, 'reviewerReviews'])->name('reviewerReviews');

Route::get('category', [HomeController::class, 'categoryResultsPage'])->name('categoryResultsPage');
Route::get('search', [HomeController::class, 'searchResultsPage'])->name('searchResultsPage');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/category/{tagId}', [HomeController::class, 'categorySearch'])->name('categorySearch');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', function () {
        return view('admin-pages.index');
    })->middleware('isAdmin')->name('dashboard');
});

Route::controller(AdminRegisterController::class)->group(function(){

    Route::get('admin/register', 'registerAdmin')->name('registerAdmin');
    Route::post('admin/register', 'registerUserAdmin')->name('registerUserAdmin');

});

Route::controller(ClientRegisterController::class)->group(function(){

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerUser')->name('registerUser');

});

Route::controller(LoginController::class)->group(function(){

    Route::get('/login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('loginAction');
    Route::get('logout', 'logout')->name('logout');
    Route::get('admin/login', 'adminLogin')->name('adminLogin');

});

Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::controller(AdminController::class)->group(function() {
        Route::get('admin/post/new', 'newPost')->name('newPost');
        Route::post('admin/upload-post', 'uploadPost')->name('uploadPost');
        Route::get('admin/post/edit/{id}', 'editPost')->name('editPost');
        Route::put('admin/post/update/{id}', 'updatePost')->name('updatePost');
    });

    Route::controller(PostsController::class)->group(function() {
        Route::get('admin/posts', 'postsPage')->name('posts');
        Route::delete('admin/post/destroy/{id}', 'deletePost')->name('deletePost');
    });
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

Route::controller(MessagesController::class)->group(function(){
    Route::get('admin/messages', 'messagesPage')->middleware('auth', 'isAdmin')->name('messages');
    Route::delete('admin/message/destroy/{id}', 'deleteMessage')->middleware('auth')->name('deleteMessage');
});

Route::controller(ClientUsersController::class)->group(function(){
    Route::get('admin/client-users', 'clientUsersPage')->middleware('auth', 'isAdmin')->name('client-users');
});

Route::controller(DesignationController::class)->group(function(){
    Route::get('management/designation', 'designation')->middleware('auth', 'isAdmin')->name('designation');
    Route::post('management/add-designation', 'newDesignation')->middleware('auth', 'isAdmin')->name('addDesignation');
    Route::post('management/edit-designation', 'editDesignation')->middleware('auth', 'isAdmin')->name('editDesignation');
    Route::delete('management/designation/destroy/{id}', 'deleteDesignation')->middleware('auth', 'isAdmin')->name('deleteDesignation');
});

