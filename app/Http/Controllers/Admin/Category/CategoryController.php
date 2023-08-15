<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Admin\Category;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Category\StoreCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        $category->attachLogo($request->file('category_logo'));

        $category->pageSeo()->create([
            'page_url' => route('category.products', $category),
            'page_title' => 'OneSport - ' .$category->category_name. ' Category',
            'meta_author' => 'OneSport Company',
            'meta_description' => "Discover the best selection of $category->category_name at OneSport. Explore a wide range of top-quality sports products and equipment designed to enhance your performance. Shop now and find everything you need for $category->category_name at OneSport."
        ]);

        $notification = array(
            'message' => __('Category Is Added Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Category\UpdateCategoryRequest  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        if ($request->hasFile('category_logo')) {
            $category->updateLogo($request->file('category_logo'));
        }

        $notification = array(
            'message' => __('Category Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->pageSeo()->delete();
        $category->translations()->delete();
        $category->delete();
        $notification = array(
            'message' => __('Category Is Deleted Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('categories.index')->with($notification);
    }
}
