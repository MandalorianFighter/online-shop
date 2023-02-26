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
        
        // return response()->json($categories);
        return view('pages.index', compact('categories', 'slider', 'featured', 'trend', 'best', 'hot'));
    }

}
