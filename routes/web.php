<?php

use App\Http\Controllers\Auth\EmailVerifyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserActionController;
use App\Http\Controllers\UserSearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::controller(PostController::class)->name('admin.')->prefix('admin/')->middleware('auth')->group(function () {
//     Route::get('posts', 'index')->name('index');
//     Route::get('posts/create', 'create')->name('create');
//     Route::post('posts', 'store')->name('store');
//     Route::get('posts/{id}', 'show')->name('show');
//     Route::get('posts/{id}/edit', 'edit')->name('edit');
//     Route::put('posts/{id}', 'update')->name('update');
//     Route::delete('posts/{id}', 'destroy')->name('destroy');
// });

// Route::controller()


Route::controller(RegisterController::class)->name('register.')->middleware(['guest'])->group(function(){

    Route::get('register','create')->name('create');
    Route::post('register','store')->name('store');
});

Route::get('email/verify/{id}/{hash}', EmailVerifyController::class)->name('verification.verify');


Route::controller(ForgotPasswordController::class)->name('forgot-password.')->middleware(['guest'])->group(function(){

    Route::get('forgot-password','create')->name('create');
    Route::post('forgot-password','store')->name('store');

});

Route::controller(ResetPasswordController::class)->middleware(['guest'])->group(function(){

    Route::get('reset-password','create')->name('password.reset');
    Route::post('reset-password','update')->name('password.update');

});
Route::controller(LoginController::class)->name('login.')->group(function(){

    Route::get('login', 'index')->middleware('guest')->name('index');
    Route::post('login', 'store')->middleware('guest')->name('store');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});



Route::name('user.')->prefix('user/')->middleware(['auth'])->group(function(){

    Route::controller(UserController::class)->group(function(){
        Route::get('home','home')->name('home');
        Route::get('notification','notification')->name('notification');

    });

    Route::controller(PostController::class)->group(function(){
        Route::get('post/create','create')->name('post.create');
        Route::post('post','store')->name('post.store');
        Route::get('post/{id}','show')->name('post.show');


    });
});

Route::controller(UserActionController::class)->name('user.')->middleware('auth')->group(function(){

    Route::post('user/like/{post_id}','like')->name('like');
    Route::post('user/dislike/{post_id}','dislike')->name('dislike');
    Route::post('user/comment/{post_id}','comment')->name('comment');
    Route::post('user/friend_request/{user_id}', 'friendRequest')->name('friend');

});

Route::controller(UserSearchController::class)->name('user.search.')->middleware('auth')->group(function(){
    Route::get('user/search','index')->name('index');
});


// Route::fallback('404', function(){
//     return view('error404');
// });
