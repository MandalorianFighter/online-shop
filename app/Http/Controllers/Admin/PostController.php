<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Admin\BlogCategory;
use App\Models\Admin\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::translatedIn(app()->getLocale())
            ->latest()
            ->get();

        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategories = BlogCategory::translatedIn(app()->getLocale())->get();
        $blogCategories = $blogCategories->pluck('category_name','id');
        return view('admin.blog.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Post\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        
        $post->attachImage($request->file('post_image'));

        $notification = array(
            'message' => __('Post Is Added Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $blogCategories = BlogCategory::translatedIn(app()->getLocale())->get();
        $blogCategories = $blogCategories->pluck('category_name','id');
        return view('admin.blog.edit', compact('post', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Post\UpdatePostRequest  $request
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        if ($request->hasFile('post_image')) {
            $post->updateImage($request->file('post_image'));
        }

        $notification = array(
            'message' => __('Post Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('posts.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $notification = array(
            'message' => __('Post Is Deleted Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('posts.index')->with($notification);
    }
}
