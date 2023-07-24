<?php

namespace App\Providers;

use App\Models\Admin\Category;
use App\Models\PageSeo;
use App\Models\Wishlist;
use App\Models\SiteContact;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
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
            $view->with(['categories' => Category::translatedIn(app()->getLocale())->get(), 'wishlist' => Wishlist::where('user_id', Auth::id())->get(), 'info' => SiteContact::first(), 'seo' => PageSeo::where('page_url', Request()->url())->first() ?? PageSeo::first()]);
        });
        Facades\View::composer('admin.admin_layouts', function (View $view) {
            $view->with(['contact' => SiteContact::first()]);
        });
        Facades\View::composer('pages.contact', function (View $view) {
            $view->with(['contact' => SiteContact::first()]);
        });

        Facades\View::composer('pages.user.recently_viewed', function (View $view) {
            $recentlyViewed = session()->get('recently_viewed', []);
            
            $view->with(['recentlyViewed' => Product::whereIn('id', $recentlyViewed)->get()]);
        });
    }
}
