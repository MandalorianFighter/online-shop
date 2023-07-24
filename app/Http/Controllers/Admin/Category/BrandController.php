<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Models\Admin\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Brand\StoreBrandRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create([
            'brand_name' => $request->brand_name,
        ]);

        $brand->attachLogo($request->file('brand_logo'));

        $notification = array(
            'message' => __('Brand Is Added Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\View\View
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Brand\UpdateBrandRequest  $request
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update([
            'brand_name' => $request->brand_name,
        ]);

        if ($request->hasFile('brand_logo')) {
            $brand->updateLogo($request->file('brand_logo'));
        }

        $notification = array(
            'message' => __('Brand Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('brands.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        $notification = array(
            'message' => __('Brand Is Deleted Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('brands.index')->with($notification);
    }
}
