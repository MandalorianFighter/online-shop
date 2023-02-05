<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth:web')->name('verification.notice');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin'], 'namespace' => 'App\Http\Controllers\Admin'], function () {   
    
    Route::get('/password', 'AdminProfileController@changePass')->name('admin.password.change');
    Route::post('/password/update', 'AdminProfileController@updatePass')->name('admin.password.update');

    // Admin Profile

    Route::get('/profile', 'AdminProfileController@show')->name('admin.profile.show');
    Route::post('/profile/update', 'AdminProfileController@adminUpdateProfile')->name('update.admin.profile');
    Route::get('/logout', 'AdminProfileController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin'], 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/login', 'AdminController@login')->name('admin.login.form');
    Route::post('/login', 'AdminController@store')->name('admin.login');
    
    Route::get('/forgot-password', 'Admin\PasswordResetLinkController@create')->name('admin.password.request');
    Route::post('/forgot-password', 'Admin\PasswordResetLinkController@store')->name('admin.password.email');
    
    Route::post('/reset-password', 'Admin\NewPasswordController@store')->name('admin.pass-reset.update');
    Route::get('/reset-password/{token}', 'Admin\NewPasswordController@create')->name('admin.password.reset');
    
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/password-change', 'App\Http\Controllers\UserController@changePassword')->name('password.change');
    Route::post('/password-update', 'App\Http\Controllers\UserController@updatePassword')->name('password.change.update');
    Route::get('/user/logout', 'App\Http\Controllers\UserController@logout')->name('user.logout');
});

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
