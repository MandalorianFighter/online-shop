<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexCategories()
    {
        $categories = Category::withOnly('subcategories')->get();
        $slider = Product::where('status',1)->where('main_slider',1)->first();
        $featured = Product::where('status',1)->orderBy('id','desc')->limit(8)->get();
        $trend = Product::where('status',1)->where('trend',1)->orderBy('id','desc')->limit(8)->get();
        $best = Product::where('status',1)->where('best_rated',1)->orderBy('id','desc')->limit(8)->get();
        $hot = Product::where('status',1)->where('hot_deal',1)->orderBy('id','desc')->limit(3)->get();
        $midSlider = Product::where('status',1)->where('mid_slider',1)->orderBy('id','desc')->limit(3)->get();

        $firstCategory = Category::first();
        $fCproducts = Product::where('category_id', $firstCategory->id)->where('status',1)->orderBy('id','desc')->limit(10)->get();

        $secondCategory = Category::skip(1)->first();
        $sCproducts = Product::where('category_id', $secondCategory->id)->where('status',1)->orderBy('id','desc')->limit(10)->get();

        $buyGet = Product::where('status',1)->where('buyone_getone',1)->orderBy('id','desc')->limit(6)->withOnly('brand')->get();
        
        // return response()->json($categories);
        return view('pages.index', compact('categories', 'slider', 'featured', 'trend', 'best', 'hot', 'midSlider', 'firstCategory', 'fCproducts', 'secondCategory', 'sCproducts', 'buyGet'));
    }

}
