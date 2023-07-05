<?php

namespace App\Providers;

use App\Models\Admin\Category;
use App\Models\Wishlist;
use App\Models\SiteContact;
use Auth;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Facades\View::composer('layouts.app', function (View $view) {
            $view->with(['categories' => Category::translatedIn(app()->getLocale())->get(), 'wishlist' => Wishlist::where('user_id', Auth::id())->get(), 'info' => SiteContact::first()]);
        });
        Facades\View::composer('admin.admin_layouts', function (View $view) {
            $view->with(['contact' => SiteContact::first()]);
        });
    }
}
