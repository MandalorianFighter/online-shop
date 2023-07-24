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
     * @return \Illuminate\View\View
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
     * @return \Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        
        $post->attachImage($request->file('post_image'));

        $post->pageSeo()->create([
            'page_url' => route('blog.post.show', $post),
            'page_title' => 'OneSport - ' .$post->title,
            'meta_author' => $post->author ?? 'OneSport Company',
            'meta_description' => "Explore the latest insights and updates from OneSport's sports blog. Stay informed with expert tips, trending topics, and inspiring stories in the world of sports. Read our $post->title and fuel your passion for all things sports.",
        ]);

        $notification = array(
            'message' => __('Post Is Added Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('posts.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        if ($request->hasFile('post_image')) {
            $post->updateImage($request->file('post_image'));
        }

        $post->regenerateSlug();

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->pageSeo()->delete();
        $post->delete();
        $notification = array(
            'message' => __('Post Is Deleted Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('posts.index')->with($notification);
    }
}
