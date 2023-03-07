<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartAdd(Request $request)
    {
        
        $prodId = $request->id;
        $product = Product::find($prodId);
        $data = [
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => 1,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => [
                'color' => '',
                'size' => '',
                'image' => $product->getFirstMediaUrl('products/imageOne')
            ],
        ];

        if($product->discount_price) {
            $data['price'] = $product->discount_price;
        }

        Cart::add($data);
        
        return json_encode(['message' => 'Product is Added to Your Basket!', 'type' => 'success' ]);
    }

    public function check()
    {
        $content = Cart::content();
        return response()->json($content);
    }
}
