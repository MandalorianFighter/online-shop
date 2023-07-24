<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Requests\Product\UpdateImageRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::translatedIn(app()->getLocale())->get();
        $categories = $categories->pluck('category_name','id');

        $subcategories = Subcategory::translatedIn(app()->getLocale())->get();
        $subcategories = $subcategories->pluck('subcategory_name','id');
        
        $brands = Brand::pluck('brand_name','id');
        return view('admin.product.create', compact('categories', 'subcategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Product\StoreProductRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        
        $product = Product::create($request->except(['image_one', 'image_two', 'image_three']));

        if($request->hasFile('image_one')) 
        {
            $product->attachImgOne($request->file('image_one'));
        }
        if ($request->hasFile('image_two')) {
            $product->attachImgTwo($request->file('image_two'));
        }
        if ($request->hasFile('image_three')) {
            $product->attachImgThree($request->file('image_three'));
        }

        $product->pageSeo()->create([
            'page_url' => route('product.details', $product),
            'page_title' => 'OneSport - ' .$product->product_name,
            'meta_author' => 'OneSport Company',
            'meta_description' => "Discover our $product->product_name at OneSport. Browse through a wide selection of top-quality sports clothes and equipment designed to enhance your performance. Get the best deals on $product->product_name and take your sport to the next level with OneSport.",
        ]);

        $notification = array(
            'message' => __('Product Is Added Successfully!'),
            'alert-type' => 'success',
        );
 
        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::translatedIn(app()->getLocale())->get();
        $categories = $categories->pluck('category_name','id');

        $subcategories = $product->category->subcategories;
        $subcategories = $subcategories->pluck('subcategory_name','id');

        $brands = Brand::pluck('brand_name','id');
        
        return view('admin.product.edit', compact('product', 'categories', 'subcategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Product\UpdateProductRequest  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        $notification = array(
            'message' => __('Product Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Product\UpdateImageRequest  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImages(UpdateImageRequest $request, Product $product)
    {
        if ($request->hasFile('image_one')) {
            $product->updateImgOne($request->file('image_one'));
        }
        if ($request->hasFile('image_two')) {
            $product->updateImgTwo($request->file('image_two'));
        }
        if ($request->hasFile('image_three')) {
            $product->updateImgThree($request->file('image_three'));
        }

        $notification = array(
            'message' => __('Product Images Are Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        Wishlist::where('prod_id', $product->id)->delete();
        $product->pageSeo()->delete();
        $product->delete();
        $notification = array(
            'message' => __('Product Is Deleted Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('products.index')->with($notification);
    }

    public function getSubcat(Request $request) 
    {
        $subcategories = Subcategory::where('category_id', $request->id)->translatedIn(app()->getLocale())->get();
        $data = $subcategories->pluck('subcategory_name', 'id');
        return json_encode($data);
    }

    public function changeStatus(Request $request) 
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->update();

        $data = [
            'message' => __('Status Updated!'),
            'status' => $product->status,
        ];

        return json_encode($data);
    }

    public function productStock()
    {
        $products = Product::all();
        return view('admin.stock.index', compact('products'));
    }
}
