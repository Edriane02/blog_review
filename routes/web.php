<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ClientRegisterController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientUserController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserManagementController;
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
Route::get('latest-reviews', [HomeController::class, 'latestReviewsPage'])->name('latestReviewsPage');
Route::get('/reviewer/{id}/reviews', [HomeController::class, 'reviewerReviews'])->name('reviewerReviews');

Route::middleware(['middleware' => 'auth:client'])->group(function () {
    Route::get('/profile', [ClientUserController::class, 'clientProfile'])->name('clientProfile');
    Route::get('/edit-profile', [ClientUserController::class, 'clientEditProfile'])->name('clientEditProfile');
    Route::post('/update-profile', [ClientUserController::class, 'clientUpdateProfile'])->name('clientUpdateProfile');
    Route::get('/change-password', [ClientUserController::class, 'clientChangePassword'])->name('clientChangePassword');
    Route::post('/update-password', [ClientUserController::class, 'clientChangePwdAction'])->name('clientChangePwdAction');
});


Route::get('category', [HomeController::class, 'categoryResultsPage'])->name('categoryResultsPage');
Route::get('search', [HomeController::class, 'searchResultsPage'])->name('searchResultsPage');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/category/{tagId}', [HomeController::class, 'categorySearch'])->name('categorySearch');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', function () {
        return view('admin-pages.index');
    })->middleware('isAdmin')->name('dashboard');
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
    Route::post('admin/login', 'adminLoginAction')->name('adminLoginAction');
    Route::get('admin/logout', 'adminLogout')->name('adminLogout');

});

Route::middleware(['auth:admin', 'isAdmin'])->group(function() {
    Route::controller(AdminController::class)->group(function() {
        Route::get('admin/post/new', 'newPost')->name('newPost');
        Route::post('admin/upload-post', 'uploadPost')->name('uploadPost');
        Route::get('admin/post/edit/{id}', 'editPost')->name('editPost');
        Route::put('admin/post/update/{id}', 'updatePost')->name('updatePost');

        // Profile management
        Route::get('admin/profile', 'profilePage')->name('profilePage');
        Route::post('admin/update-profile', 'updateProfile')->name('updateProfile');
        Route::get('admin/change-password', 'changePasswordPage')->name('changePasswordPage');
        Route::post('admin/change-password', 'changePassword')->name('changePassword');

    });

    Route::controller(PostsController::class)->group(function() {
        Route::get('admin/posts', 'postsPage')->name('posts');
        Route::delete('admin/post/destroy/{id}', 'deletePost')->name('deletePost');
    });
});

Route::get('admin/unauthorized', [AdminController::class, 'unauthorizedPage'])->name('unauthorizedPage');


Route::controller(ReviewerController::class)->group(function(){
    Route::get('admin/reviewer', 'reviewerPage')->middleware('auth:admin', 'isAdmin')->name('reviewer');
    Route::post('admin/add-reviewer', 'addReviewer')->middleware('auth:admin', 'isAdmin')->name('addReviewer');
    Route::post('admin/edit-reviewer', 'editReviewer')->middleware('auth:admin', 'isAdmin')->name('editReviewer');
    Route::delete('admin/reviewer/destroy/{id}', 'deleteReviewer')->middleware('auth:admin')->name('deleteReviewer');
});

Route::controller(TagController::class)->group(function(){
    Route::get('admin/tags', 'tagsPage')->middleware('auth:admin', 'isAdmin')->name('tags');
    Route::post('admin/add-tag', 'addTag')->middleware('auth:admin', 'isAdmin')->name('addTag');
    Route::post('admin/edit-tag', 'editTag')->middleware('auth:admin', 'isAdmin')->name('editTag');
    Route::delete('admin/tag/destroy/{id}', 'deleteTag')->middleware('auth:admin')->name('deleteTag');
});

Route::controller(MessagesController::class)->group(function(){
    Route::get('admin/messages', 'messagesPage')->middleware('auth:admin', 'isAdmin')->name('messages');
    Route::delete('admin/message/destroy/{id}', 'deleteMessage')->middleware('auth:admin')->name('deleteMessage');
});



Route::controller(DesignationController::class)->group(function(){
    Route::get('management/designation', 'designation')->middleware('auth:admin', 'isManagement')->name('designation');
    Route::post('management/add-designation', 'newDesignation')->middleware('auth:admin', 'isManagement')->name('addDesignation');
    Route::post('management/edit-designation', 'editDesignation')->middleware('auth:admin', 'isManagement')->name('editDesignation');
    Route::delete('management/designation/destroy/{id}', 'deleteDesignation')->middleware('auth:admin', 'isManagement')->name('deleteDesignation');
});

Route::controller(UserManagementController::class)->group(function(){
    Route::get('management/client-users', 'clientUsersPage')->middleware('auth:admin', 'isManagement')->name('client-users');    
    Route::get('management/admin-users', 'adminUsersPage')->middleware('auth:admin', 'isManagement')->name('admin-users');
    Route::get('management/all-users', 'allUsersPage')->middleware('auth:admin', 'isManagement')->name('all-users');
    Route::post('management/new-client-user', 'newClientUser')->middleware('auth:admin', 'isManagement')->name('new-client-user');
    Route::post('management/new-admin-user', 'newAdminUser')->middleware('auth:admin', 'isManagement')->name('new-admin-user');
    Route::delete('management/client-users/destroy/{id}', 'deleteClientUser')->middleware('auth:admin')->name('deleteClientUser');
    Route::delete('management/admin-users/destroy/{id}', 'deleteAdminUser')->middleware('auth:admin')->name('deleteAdminUser');
    Route::delete('management/all-users/destroy/{id}', 'deleteUser')->middleware('auth:admin')->name('deleteUser');
});