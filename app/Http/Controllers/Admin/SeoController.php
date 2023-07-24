<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSeo;

class SeoController extends Controller
{
    public function index()
    {
        return view('admin.seo.index');
    }

    public function create()
    {
        $urls = [
            route('home') => route('home'),
            route('cart.show') => route('cart.show'),
            route('blog.post') => route('blog.post'),
            route('product.search') => route('product.search'),
            route('contact.page') => route('contact.page'),
            'custom' => 'Other',
        ];
        return view('admin.seo.create',compact('urls'));
    }

    public function store(Request $request)
    {
        $page_url = $request->page_url;
        if($page_url == 'custom') $page_url = $request->custom_option;
        
        PageSeo::create([
            'page_url' => $page_url,
            'page_title' => $request->page_title,
            'meta_author' => $request->meta_author,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => strip_tags($request->meta_description),
            'google_analytics' => $request->google_analytics,
            'bing_analytics' => $request->bing_analytics,
        ]);
        
        $notification = array(
            'message' => __('SEO for Page Is Created Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function edit(PageSeo $seo)
    {
        return view('admin.seo.edit',compact('seo'));
    }

    public function update(Request $request, PageSeo $seo)
    {
        $seo->update($request->except('meta_description'));
        $seo->meta_description = strip_tags($request->meta_description);
        $seo->save();
        $notification = array(
            'message' => __('SEO Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('admin.seo.index')->with($notification);
    }
}
