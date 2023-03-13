<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Requests\Cart\UpdateCartItemRequest;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

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
        $prodId = $request->prod_id;
        $product = Product::find($prodId); 

        $data = [
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => [
                'color' => $request->color,
                'size' => $request->size,
                'image' => $product->getFirstMediaUrl('products/imageOne', 'thumb')
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

    public function viewProduct(Request $request)
    {
        $product = Product::find($request->id);
        $colors = explode(',', $product->color);
        $product_colors = array_combine($colors, $colors);
        $sizes = explode(',', $product->size);
        $product_sizes = array_combine($sizes, $sizes);
        return response()->json([
            'product' => $product,
            'imageOne' => $product->getFirstMediaUrl('products/imageOne', 'thumb-mid'),  
            'colors' => $product_colors,
            'sizes' => $product_sizes,
        ]);
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

    public function checkout()
    {
        if(!Auth::guard('web')->check()) {
            $notification = array(
                'message' => 'Please, Login First!',
                'alert-type' => 'warning',
            );
            return redirect()->route('login')->with($notification);
        }

        $cart = Cart::content();
        return view('pages.checkout', compact('cart'));
    }

    public function wishlist()
    {
        $user = Auth::guard('web')->user();
        $wishProducts = $user->wishlist()->with('product')
        ->orderby('id', 'desc')
        ->paginate(5);

        // return response()->json($wishProducts);
        return view('pages.wishlist', compact('wishProducts'));
    }

    public function check()
    {
        $content = Cart::content();
        return response()->json($content);
    }
}
