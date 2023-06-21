<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productDetails(Product $product)
    {
        $colors = explode(',', $product->color);
        $product_colors = array_combine($colors, $colors);
        $sizes = explode(',', $product->size);
        $product_sizes = array_combine($sizes, $sizes);
        return view('pages.product_details', compact('product', 'product_colors', 'product_sizes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function subcategoryProducts(Subcategory $subcategory)
    {
        $products = $subcategory->products()->paginate(20);
        $categories = Category::all();
        $brandIds = $subcategory->products()->pluck('brand_id')->unique();
        $brands = Brand::whereIn('id', $brandIds)->get();
        
        return view('pages.subcategory_products', compact('subcategory', 'products', 'categories', 'brands'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function categoryProducts(Category $category)
    {
        $products = $category->products()->paginate(20);
        $categories = Category::all();
        $brandIds = $category->products()->pluck('brand_id')->unique();
        $brands = Brand::whereIn('id', $brandIds)->get();
        
        return view('pages.category_products', compact('category', 'products', 'categories', 'brands'));
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
     * @param  \App\Http\Requests\AddToCartRequest  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productAddCart(AddToCartRequest $request, Product $product)
    {
        $data = [
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => [
                'color' => $request->color,
                'size' => $request->size,
                'image' => $product->getFirstMediaUrl('products/imageOne')
            ],
        ];

        if($product->discount_price) {
            $data['price'] = $product->discount_price;
        }

        Cart::add($data);
        
        $notification = array(
            'message' => __('Product Successfully Added!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}


