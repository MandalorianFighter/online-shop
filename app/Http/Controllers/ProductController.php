<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\View\View
     */
    public function productDetails(Product $product)
    {
        $recentlyViewed = session()->get('recently_viewed', []);
        if (!in_array($product->id, $recentlyViewed)) {
            array_unshift($recentlyViewed, $product->id);
            $recentlyViewed = array_slice($recentlyViewed, 0, 10); // Limit the recently viewed array to 10 items
            session()->put('recently_viewed', $recentlyViewed);
        }

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
     * @return \Illuminate\View\View
     */
    public function subcategoryProducts(Request $request, Subcategory $subcategory)
    {
        $brandSlug = trim($request->brand);
        $brand = null;
        
        if($brandSlug) $brand = Brand::where('slug', $brandSlug)->first();

        if($brand) {
            $products = Product::where('subcategory_id', $subcategory->id)->where('brand_id', $brand->id)->paginate(20);
        } else {
            $products = $subcategory->products()->paginate(20);
        }
        $categories = Category::all();
        $brandIds = $subcategory->products()->pluck('brand_id')->unique();
        $brands = Brand::whereIn('id', $brandIds)->get();
        
        return view('pages.subcategory_products', compact('subcategory', 'products', 'categories', 'brands'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\View\View
     */
    public function categoryProducts(Request $request, Category $category)
    {
        $brandSlug = trim($request->brand);
        $brand = null;
        
        if($brandSlug) $brand = Brand::where('slug', $brandSlug)->first();

        if($brand) {
            $products = Product::where('category_id', $category->id)->where('brand_id', $brand->id)->paginate(20);
        } else {
            $products = $category->products()->paginate(20);
        }
        $categories = Category::all();
        $brandIds = $category->products()->pluck('brand_id')->unique();
        $brands = Brand::whereIn('id', $brandIds)->get();
        
        return view('pages.category_products', compact('category', 'products', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AddToCartRequest  $request
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\RedirectResponse
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

    public function search(Request $request)
    {
        $search = '%'.trim($request->search).'%';

        if($request->category) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $products = $category->products()->whereTranslationLike('product_name', $search)->paginate(20);
        } else {
            $products = Product::whereTranslationLike('product_name', $search)->paginate(20);
        }
        $categories = Category::all();
        $brandIds = $products->pluck('brand_id')->unique();
        $brands = Brand::whereIn('id', $brandIds)->get();
        return view('pages.search',compact('products', 'categories', 'brands'));
    }
}


