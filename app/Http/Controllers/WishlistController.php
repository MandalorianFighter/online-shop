<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wish\StoreWishlistRequest;
use App\Http\Requests\Wish\UpdateWishlistRequest;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
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
     * @param  \App\Http\Requests\StoreWishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishlistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishlistRequest  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
    
    public function wishlistAdd(Request $request)
    {
        $userId = Auth::id();
        $prodId = $request->id;
        $check = Wishlist::where('user_id', $userId)->where('product_id', $prodId)->first();
        $data = [];

        if(Auth::check()) {
            if($check) {
                $data['message'] = 'Product is Already in Your Wishlist!';
            } else {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $prodId,
                ]);
                $data['message'] = 'Product is Added to Wishlist!';
                $data['type'] = 'success';
            }    
        } else {
            $data['message'] = 'Please, <a href="/login">Login</a> at First!';
        }
        
        return json_encode($data);
    }
}
