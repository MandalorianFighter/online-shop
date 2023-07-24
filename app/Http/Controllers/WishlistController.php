<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    
    public function wishlistAdd(Request $request)
    {
        $userId = Auth::id();
        $prodId = $request->id;
        $check = Wishlist::where('user_id', $userId)->where('product_id', $prodId)->first();
        $data = [];

        if(Auth::check()) {
            if($check) {
                $data['message'] = __('Product is Already in Your Wishlist!');
            } else {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $prodId,
                ]);
                $data['count'] = Wishlist::where('user_id', $userId)->count();
                $data['message'] = __('Product is Added to Wishlist!');
                $data['type'] = 'success';
            }    
        } else {
            $data['message'] = __('Please, <a href="/login">Login</a> at First!');
        }
        
        return json_encode($data);
    }
}
