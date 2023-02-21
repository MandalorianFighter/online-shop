<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category:id,category_name', 'subcategory:id,subcategory_name', 'brand:id,brand_name'])->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name','id');
        $subcategories = Subcategory::pluck('subcategory_name','id');
        $brands = Brand::pluck('brand_name','id');
        return view('admin.product.create', compact('categories', 'subcategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Product\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        
        $product = Product::create($request->except(['image_one', 'image_two', 'image_three']));

        if($request->hasFile('image_one') && $request->hasFile('image_two') && $request->hasFile('image_three')) {
            $product->attachImg($request->file('image_one'));
            $product->attachImg($request->file('image_two'));
            $product->attachImg($request->file('image_three'));
        }

        $notification = array(
            'message' => 'Product Is Added Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Product\UpdateProductRequest  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $notification = array(
            'message' => 'Product Is Deleted Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('products.index')->with($notification);
    }

    public function getSubcat(Request $request) 
    {
        $data = Subcategory::where('category_id', $request->id)->pluck('subcategory_name', 'id');
        return json_encode($data);
    }

    public function changeStatus(Request $request) 
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->update();

        $data = [
            'message' => 'Status Updated!',
            'status' => $product->status,
        ];

        return json_encode($data);
    }
}
