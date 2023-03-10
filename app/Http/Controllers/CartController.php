<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Requests\Cart\UpdateCartItemRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Admin\Product;

class CartController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Cart\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        $prodId = $request->id;
        $product = Product::find($prodId);   
        
        $colors = explode(',', $product->color);
        $product_colors = array_combine($colors, $colors);
        $sizes = explode(',', $product->size);
        $product_sizes = array_combine($sizes, $sizes);

        $data = [
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => 1,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => [
                'colors' => $product_colors ?? [],
                'sizes' => $product_sizes ?? [],
                'image' => $product->getFirstMediaUrl('products/imageOne', 'thumb')
            ],
        ];

        if($product->discount_price) {
            $data['price'] = $product->discount_price;
        }

        Cart::add($data);

        $response = [
            'message' => 'Product is Added to Cart!',
            'count' => Cart::count(),
            'subtotal' => Cart::subtotal()
        ];
        
        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
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

    
    public function updateItem(UpdateCartItemRequest $request)
    {
        $rowId = $request->id;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
        $item = Cart::get($rowId);

        $response = [
            'message' => 'Product Order is Specified!',
            'qty' => $qty,
            'itemTotal' => $item->subtotal,
            'total' => Cart::total(),
            'count' => Cart::count(),
            'subtotal' => Cart::subtotal()
        ];

        return json_encode($response);
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

    public function destroyItem(UpdateCartRequest $request)
    {
        $rowId = $request->id;
        Cart::remove($rowId);

        $response = [
            'message' => 'Product is Removed from Cart!',
            'total' => Cart::total(),
            'count' => Cart::count(),
            'subtotal' => Cart::subtotal()
        ];
        
        return json_encode($response);
    }

    public function check()
    {
        $content = Cart::content();
        return response()->json($content);
    }
}
