<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\StoreSubCategoryRequest;
use App\Http\Requests\SubCategory\UpdateSubCategoryRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        $categories = Category::translatedIn(app()->getLocale())->get();
        $categories = $categories->pluck('category_name','id');
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SubCategory\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $subcategory = Subcategory::create($request->validated());

        $subcategory->pageSeo()->create([
            'page_url' => route('subcategory.products', $subcategory),
            'page_title' => 'OneSport - ' .$subcategory->subcategory_name. ' Subcategory',
            'meta_author' => 'OneSport Company',
            'meta_description' => "Explore our $subcategory->subcategory_name collection at OneSport. Elevate your performance with our handpicked selection of $subcategory->subcategory_name gear. Shop now and excel in your sport with OneSport."
        ]);

        $notification = array(
            'message' => __('SubCategory Is Added Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Subcategory  $subcategory
     * @return \Illuminate\View\View
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::translatedIn(app()->getLocale())->get();
        $categories = $categories->pluck('category_name','id');
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SubCategory\UpdateSubCategoryRequest  $request
     * @param  \App\Models\Admin\Subcategory  $subcategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSubCategoryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update($request->validated());

        // dd(Str::slug($request->en['subcategory_name']));

        $notification = array(
            'message' => __('SubCategory Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('subcategories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Subcategory  $subcategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->pageSeo()->delete();
        $subcategory->delete();
        $notification = array(
            'message' => __('SubCategory Is Deleted Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('subcategories.index')->with($notification);
    }
}
