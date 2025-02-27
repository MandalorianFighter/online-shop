<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Requests\Cart\UpdateCartItemRequest;
use App\Models\Admin\Coupon;
use App\Models\Setting;
use App\Models\Wishlist;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Cart\StoreCartRequest  $request
     * @return \Illuminate\Http\RedirectResponse
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
            'message' => __('Product Successfully Added!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Product  $product
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

    public function viewProduct(Request $request)
    {
        $product = Product::with('category', 'subcategory', 'brand:id,brand_name')->find($request->id);
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
    
    public function updateItem(UpdateCartItemRequest $request)
    {
        $rowId = $request->id;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
        $item = Cart::get($rowId);

        $response = [
            'message' => __('Product Order is Specified!'),
            'qty' => $qty,
            'itemTotal' => $item->subtotal,
            'total' => Cart::total(),
            'count' => Cart::count(),
            'subtotal' => Cart::subtotal()
        ];

        return json_encode($response);
    }

    public function destroy()
    {
        Cart::destroy();

        $notification = array(
            'message' => __('Shopping Cart is Empty!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function destroyItem(UpdateCartRequest $request)
    {
        $rowId = $request->id;
        Cart::remove($rowId);

        $response = [
        'message' => __('Product is Removed from Cart!'),
        'total' => Cart::total(),
        'count' => Cart::count(),
        'subtotal' => Cart::subtotal(),
        'empty' => __('Shopping Cart is Empty'),
            ];
        
        return json_encode($response);
    }

    public function checkout()
    {
        if(Cart::count()) {
            $cart = Cart::content();
            $settings = Setting::first();
            return view('pages.checkout', compact('cart', 'settings'));
        } else {
            $notification = array(
                'message' => __('Shopping Cart is Empty!'),
                'alert-type' => 'warning',
            );
    
            return redirect()->route('home')->with($notification);
        }
    }

    public function payment()
    {
        if(Cart::count()) {
            $cart = Cart::content();
            $settings = Setting::first();
            return view('pages.payment', compact('cart', 'settings'));
        } else {
            $notification = array(
                'message' => __('Shopping Cart is Empty!'),
                'alert-type' => 'warning',
            );

            return redirect()->route('home')->with($notification);
        }
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

    public function coupon(Request $request)
    {
        $coupon = $request->coupon;

        $check = Coupon::where('coupon', $coupon)->first();
        if($check) {
            Session::put('coupon',[
                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => Cart::subtotal() - $check->discount,
            ]);
            $notification = array(
                'message' => __('Coupon Successfully Applied!'),
                'alert-type' => 'success',
            );
    
            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message' => __('Invalid Coupon!'),
            'alert-type' => 'warning',
        );

        return redirect()->back()->with($notification);
    }

    public function couponRemove()
    {
        Session::forget('coupon');
        
        $notification = array(
            'message' => __('Coupon is Removed!'),
            'alert-type' => 'warning',
        );

        return redirect()->back()->with($notification);       
    }

    public function updateCheck(Request $request)
    {
        if(Session::has('coupon')) {
            $response = [
                'message' => __('Please, Specify Item Checkout Before Adding a Coupon!'),
            ];
            return json_encode($response);
        }
        $rowId = $request->id;
        $qty = $request->qty;
        $settings = Setting::first();

        Cart::update($rowId, $qty);
        $item = Cart::get($rowId);

        $response = [
            'message' => __('Product Checkout is Specified!'),
            'qty' => $qty,
            'itemTotal' => $item->subtotal,
            'total' => Cart::total(),
            'count' => Cart::count(),
            'subtotal' => Cart::subtotal(),
            'subtotalSp' => Cart::total(),
            'totalSp' => Cart::total() + $settings->shipping_charge + $settings->vat,
        ];

        return json_encode($response);
    }

    public function destroyCheck(Request $request)
    {
        if(Session::has('coupon')) {
            $response = [
                'message' => __('Please, Remove Item Before Adding a Coupon!'),
            ];
            return json_encode($response);
        }
        $rowId = $request->id;
        Cart::remove($rowId);
        $settings = Setting::first();

        $response = [
            'message' => __('Product is Removed from Checkout!'),
            'total' => Cart::total(),
            'count' => Cart::count(),
            'subtotal' => Cart::subtotal(),
            'subtotalSp' => Cart::total(),
            'totalSp' => Cart::total() + $settings->shipping_charge + $settings->vat,
            'empty' => __('Shopping Cart is Empty'), 
        ];

        return json_encode($response);
    }

    public function destroyWish(Request $request)
    {
        $wishItem = Wishlist::find($request->id);
        $wishItem->delete();
        $count = Wishlist::where('user_id', Auth::id())->count();

        $response = [
            'message' => __('Product is Removed from Wishlist!'),
            'count' => $count,
            'empty' => __('No items have been added to the wishlist yet'), 
        ];
        
        return json_encode($response);
    }

    public function check()
    {
        $content = Cart::content();
        return response()->json($content);
    }
}
