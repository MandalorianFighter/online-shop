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



Route::get('/', 'App\Http\Controllers\HomeController@indexCategories')->name('home');

// Google

Route::get('/login/google', 'App\Http\Controllers\SocialController@redirectToGoogle')->name('login.google');
Route::get('/login/google/callback', 'App\Http\Controllers\SocialController@handleGoogleCallback');

// Facebook

Route::get('/login/facebook', 'App\Http\Controllers\SocialController@redirectToFacebook')->name('login.facebook');
Route::get('/login/facebook/callback', 'App\Http\Controllers\SocialController@handleFacebookCallback');

Route::view('/email/verify', 'auth.verify-email')->middleware('auth:web')->name('verification.notice');

Route::post('newsletters/sign-up', 'App\Http\Controllers\Admin\Category\NewsletterController@store')->name('newsletters.store');

// Admin routes

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum,admin', config('jetstream.auth_session'),'verified'], 'namespace' => 'App\Http\Controllers\Admin'], function () {   

    Route::get('/dashboard', 'OrderController@dashboard')->name('admin.dashboard');

    Route::group(['middleware' => 'admin.access:category'], function () {
        Route::resource('categories', Category\CategoryController::class)->except(['create', 'show']);
        Route::resource('brands', Category\BrandController::class)->except(['create', 'show']);
        Route::resource('subcategories', Category\SubCategoryController::class)->except(['create', 'show']);
    });
    Route::group(['middleware' => 'admin.access:coupon'], function () {
        Route::resource('coupons', Category\CouponController::class)->except(['create', 'show']);
    });
    Route::group(['middleware' => 'admin.access:other'], function () {
        Route::resource('newsletters', Category\NewsletterController::class)->only(['index']);
        // Seo Settings Routes
        Route::get('/seo-settings', 'SeoController@index')->name('admin.seo.index');
        Route::get('/seo-settings/create', 'SeoController@create')->name('admin.seo.create');
        Route::post('/seo-settings/store', 'SeoController@store')->name('admin.seo.store');
        Route::get('/seo-settings/{seo}/edit', 'SeoController@edit')->name('admin.seo.edit');
        Route::put('/seo-settings/update/{seo}', 'SeoController@update')->name('admin.seo.update');
    });
    Route::group(['middleware' => 'admin.access:product'], function () {
        Route::resource('products', ProductController::class);
        Route::post('/subcategories/defined', 'ProductController@getSubcat')->name('get.subcategories');
        Route::post('/product/status', 'ProductController@changeStatus')->name('change.status');
        Route::put('/product/images/{product}', 'ProductController@updateImages')->name('products.update.images');
    });
    Route::group(['middleware' => 'admin.access:blog'], function () {
        Route::resource('blog-categories', BlogCategoryController::class)->except(['create', 'show']);
        Route::resource('posts', PostController::class);
    });
    Route::group(['middleware' => 'admin.access:orders'], function () {
        // Admin Order Route
        Route::get('/order/pending', 'OrderController@newOrders')->name('admin.new_orders');
        Route::get('/order/view/{order}', 'OrderController@viewOrder')->name('admin.view_order');

        Route::get('/payment/accept/{order}', 'OrderController@acceptPayment')->name('admin.accept_payment');
        Route::get('/payment/cancel/{order}', 'OrderController@cancelPayment')->name('admin.cancel_payment');
        Route::get('/delivery/process/{order}', 'OrderController@processDelivery')->name('admin.process_delivery');
        Route::get('/delivery/success/{order}', 'OrderController@deliverySuccess')->name('admin.delivery_success');

        Route::get('/order/payment-accept', 'OrderController@acceptPaymentOrders')->name('admin.accept_payment_orders');
        Route::get('/order/canceled', 'OrderController@canceledOrders')->name('admin.canceled_orders');
        Route::get('/order/process-delivery', 'OrderController@processDeliveryOrders')->name('admin.process_delivery_orders');
        Route::get('/order/delivery-success', 'OrderController@deliverySuccessOrders')->name('admin.delivery_success_orders');
    });
    Route::group(['middleware' => 'admin.access:report'], function () {
        // Order Report Routes
        Route::get('/reports/today-orders', 'ReportController@todayOrders')->name('admin.today_orders');
        Route::get('/reports/today-deliveries', 'ReportController@todayDeliveries')->name('admin.today_deliveries');
        Route::get('/reports/this-month', 'ReportController@thisMonth')->name('admin.this_month');
        Route::get('/reports/filter', 'ReportController@filter')->name('admin.filter_reports');
    });
    Route::group(['middleware' => 'admin.access:role'], function () {
        Route::resource('admins', UserRoleController::class)->except(['show', 'destroy']);
    });
    Route::group(['middleware' => 'admin.access:setting'], function () {
        Route::resource('contacts', SiteContactController::class)->only(['edit', 'update']);
    });
    Route::group(['middleware' => 'admin.access:return_orders'], function () {
        Route::get('/request/orders/return', 'ReturnOrderController@returnRequests')->name('admin.return_requests');
        Route::get('/request/order-approve/{order}', 'ReturnOrderController@approve')->name('admin.return_approve');
        Route::get('/request/orders/all-returns', 'ReturnOrderController@allReturns')->name('admin.all_returns');
    });
    Route::group(['middleware' => 'admin.access:stock'], function () {
        Route::get('/products-stock', 'ProductController@productStock')->name('products.stock');
    });
    Route::group(['middleware' => 'admin.access:contact'], function () {
        Route::get('/messages', 'ContactController@indexMessages')->name('messages.index');
        Route::get('/messages/{message}', 'ContactController@viewMessage')->name('message.show');
    });

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
    Route::post('/forgot-password/store', 'Admin\Reset\PasswordResetLinkController@store')->name('admin.password.email');
    
    Route::post('/reset-password', 'Admin\Reset\NewPasswordController@store')->name('admin.pass-reset.update');
    Route::get('/reset-password/{token}', 'Admin\Reset\NewPasswordController@create')->name('admin.password.reset');
});

// User routes

Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\UserController@dashboard')->name('dashboard');
    Route::get('/order/view/{order}', 'App\Http\Controllers\UserController@viewOrder')->name('view.order');

    Route::get('/user/profile/edit', 'App\Http\Controllers\UserController@editProfile')->name('profile.edit');
    Route::put('/user/profile/update/{user}', 'App\Http\Controllers\UserController@updateProfile')->name('profile.update');

    Route::get('/password-change', 'App\Http\Controllers\UserController@changePass')->name('password.change');
    Route::put('/password-update/{user}', 'App\Http\Controllers\UserController@updatePass')->name('password.change.update');
    Route::get('/user/logout', 'App\Http\Controllers\UserController@logout')->name('user.logout');

    Route::get('/user/checkout', 'App\Http\Controllers\CartController@checkout')->name('user.checkout');
    Route::get('/user/payment', 'App\Http\Controllers\CartController@payment')->name('user.payment');
    Route::post('/user/payment/process', 'App\Http\Controllers\PaymentController@payment')->name('user.payment.process');
    Route::post('/user/stripe/charge', 'App\Http\Controllers\PaymentController@stripeCharge')->name('stripe.charge');
    Route::post('/user/oncash/charge', 'App\Http\Controllers\PaymentController@oncashCharge')->name('oncash.charge');
    
    Route::get('/user/wishlist', 'App\Http\Controllers\CartController@wishlist')->name('user.wishlist');

    Route::post('/user/coupon', 'App\Http\Controllers\CartController@coupon')->name('apply.coupon');
    Route::get('/user/coupon/remove', 'App\Http\Controllers\CartController@couponRemove')->name('remove.coupon');

    // Order Tracking Route

    Route::post('/order/tracking', 'App\Http\Controllers\UserController@orderTracking')->name('order.tracking');

    // Return Order Route

    Route::get('/order/list/success', 'App\Http\Controllers\UserController@listSuccess')->name('order_list.success');
    Route::post('/order/return', 'App\Http\Controllers\UserController@orderReturn')->name('order.return');

    Route::post('/user/paypal/create', 'App\Http\Controllers\PaymentController@paypalCreate')->name('paypal.create');
    Route::get('/user/paypal/execute', 'App\Http\Controllers\PaymentController@paypalCharge')->name('paypal.execute');
    Route::get('/payment/success', 'App\Http\Controllers\PaymentController@paymentSuccess')->name('payment.success');
    Route::get('/payment/cancel', 'App\Http\Controllers\PaymentController@paymentCancel')->name('payment.cancel');
    Route::get('/payment/failure', 'App\Http\Controllers\PaymentController@paymentFailure')->name('payment.failure');
});

// Frontend Routes

// Add Wishlist 
Route::resource('wishlist', App\Http\Controllers\WishlistController::class);
Route::post('/add-product/wishlist', 'App\Http\Controllers\WishlistController@wishlistAdd')->name('wishlist.add');

// Add Product to Cart
Route::get('/cart/show', 'App\Http\Controllers\CartController@show')->name('cart.show');
Route::post('/cart/product/add', 'App\Http\Controllers\CartController@store')->name('cart-product.add');
Route::delete('/cart', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

// Cart Product Ajax
Route::post('/cart/product/update', 'App\Http\Controllers\CartController@updateItem')->name('cart-item.update');
Route::post('/cart/product/delete', 'App\Http\Controllers\CartController@destroyItem')->name('cart-item.delete');
Route::post('/cart/product/view', 'App\Http\Controllers\CartController@viewProduct')->name('cart-product.view');

Route::get('/check', 'App\Http\Controllers\CartController@check');

// Check Product Ajax
Route::post('/checkout/product/update', 'App\Http\Controllers\CartController@updateCheck')->name('check-item.update');
Route::post('/checkout/product/delete', 'App\Http\Controllers\CartController@destroyCheck')->name('check-item.delete');

Route::post('/wishlist/product/delete', 'App\Http\Controllers\CartController@destroyWish')->name('wish-item.delete');


// Frontend Product
Route::get('/products/details/{product}', 'App\Http\Controllers\ProductController@productDetails')->name('product.details');
Route::post('/products/add-cart/{product}', 'App\Http\Controllers\ProductController@productAddCart')->name('product.add-cart');

// Blog Post Routes

Route::get('/blog/posts', 'App\Http\Controllers\BlogController@index')->name('blog.post');
Route::get('/blog/posts/show/{post}', 'App\Http\Controllers\BlogController@show')->name('blog.post.show');

// Frontend Subcategory
Route::get('/products/subcategory/{subcategory}', 'App\Http\Controllers\ProductController@subcategoryProducts')->name('subcategory.products');
Route::get('/products/category/{category}', 'App\Http\Controllers\ProductController@categoryProducts')->name('category.products');

// Contact Page Route
Route::get('/contact-page', 'App\Http\Controllers\Admin\ContactController@showForm')->name('contact.page');
Route::post('/contact-message', 'App\Http\Controllers\Admin\ContactController@contactMessage')->name('contact.message');

// Product Search Route
Route::post('/product-search', 'App\Http\Controllers\ProductController@search')->name('product.search');