<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Admin\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create([
            'brand_name' => $request->brand_name,
        ]);

        $brand->attachLogo($request->file('brand_logo'));

        $notification = array(
            'message' => 'Brand Is Added Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update([
            'brand_name' => $request->brand_name,
        ]);
        $image = $request->file('brand_logo');

        if ($request->hasFile('brand_logo')) {
            $brand->clearMediaCollection('brands');
            $brand->addMedia($image)
            ->usingFileName(time().'.'.$image->extension())
            ->toMediaCollection('brands');
        }

        $notification = array(
            'message' => 'Brand Is Updated Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('brands.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        $notification = array(
            'message' => 'Brand Is Deleted Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('brands.index')->with($notification);
    }
}
