<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['middleware'=>'auth'], function()
{
    Route::get('home', function()
    {
        return view('dashboard.home');
    });
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

Route::controller(HomeController::class)->group(function(){

    Route::get('/admin', 'adminHome')->middleware('auth', 'isAdmin')->name('index');
    Route::get('/home', 'home')->name('home');

});

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/posts', 'allPosts')->name('posts');

});




