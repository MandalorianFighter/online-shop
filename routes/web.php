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

Route::resource('wishlist', App\Http\Controllers\WishlistController::class);
Route::post('/add-product/wishlist', 'App\Http\Controllers\WishlistController@wishlistAdd')->name('wishlist.add');
Route::post('/add-product/card', 'App\Http\Controllers\CartController@cartAdd')->name('cart.add');
Route::get('/check', 'App\Http\Controllers\CartController@check');

Route::get('/', 'App\Http\Controllers\HomeController@indexCategories')->name('home');

Route::view('/email/verify', 'auth.verify-email')->middleware('auth:web')->name('verification.notice');

// Admin routes

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum,admin', config('jetstream.auth_session'),'verified'], 'namespace' => 'App\Http\Controllers\Admin'], function () {   

    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');

    Route::resource('categories', Category\CategoryController::class)->except(['create', 'show']);
    Route::resource('brands', Category\BrandController::class)->except(['create', 'show']);
    Route::resource('subcategories', Category\SubCategoryController::class)->except(['create', 'show']);
    Route::resource('coupons', Category\CouponController::class)->except(['create', 'show']);
    Route::resource('newsletters', Category\NewsletterController::class)->only(['index', 'store', 'destroy']);
    Route::resource('products', ProductController::class);
    Route::post('/subcategories/defined', 'ProductController@getSubcat')->name('get.subcategories');
    Route::post('/product/status', 'ProductController@changeStatus')->name('change.status');
    Route::put('/product/images/{product}', 'ProductController@updateImages')->name('products.update.images');
    Route::resource('blog-categories', BlogCategoryController::class)->except(['create', 'show']);
    Route::resource('posts', PostController::class);

    // Admin change password
    
    Route::get('/password', 'AdminProfileController@changePass')->name('admin.password.change');
    Route::put('/password/update', 'AdminProfileController@updatePass')->name('admin.password.update');  //+

    // Admin Profile

    Route::get('/profile', 'AdminProfileController@show')->name('admin.profile.show');
    Route::put('/profile/update', 'AdminProfileController@adminUpdateProfile')->name('update.admin.profile'); //no view
    Route::get('/logout', 'AdminProfileController@logout')->name('admin.logout');
});

// Admin login & forgot password

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin'], 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/login', 'AdminController@login')->name('admin.login.form');
    Route::post('/login', 'AdminController@store')->name('admin.login');
    
    Route::get('/forgot-password', 'Admin\Reset\PasswordResetLinkController@create')->name('admin.password.request');
    Route::post('/forgot-password', 'Admin\Reset\PasswordResetLinkController@store')->name('admin.password.email');
    
    Route::post('/reset-password', 'Admin\Reset\NewPasswordController@store')->name('admin.pass-reset.update');
    Route::get('/reset-password/{token}', 'Admin\Reset\NewPasswordController@create')->name('admin.password.reset');
});

// User routes

Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    

    Route::get('/password-change', 'App\Http\Controllers\UserController@changePass')->name('password.change');
    Route::put('/password-update/{user}', 'App\Http\Controllers\UserController@updatePass')->name('password.change.update');
    Route::get('/user/logout', 'App\Http\Controllers\UserController@logout')->name('user.logout');
});
