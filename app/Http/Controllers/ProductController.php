<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Admin\Product;

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
            'message' => 'Product Successfully Added!',
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
