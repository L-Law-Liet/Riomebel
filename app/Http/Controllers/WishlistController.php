<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Product };
use App\Http\Requests\{ AddWishlistRequest, RemoveWishlistRequest };
// use Darryldecode\Cart\Cart;



class WishlistController extends Controller
{
    public function add(AddWishlistRequest $request)
    {
        $wish_list = app('wishlist');
        $product = Product::findOrFail($request->product_id);

        $price = $product->new_price;
        
        $wish_list->add(array(
        'id' => $product->id,
        'name' => $product->name,
        'price' => intval($price),
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $product
        ));

        $wish_lists = app('wishlist')->getContent();
        return [
            'wishlist_list'  => view('partials.wishlist_lists', compact('wish_lists'))->render(),
        ];
    }

    public function remove(RemoveWishlistRequest $request)
    {
        $wish_list = app('wishlist');
        $id = $request->product_id;

        $wish_list->remove($id);
        $wish_lists = app('wishlist')->getContent();
        return [
            'wishlist_list'  => view('partials.wishlist_lists', compact('wish_lists'))->render(),
        ];
    }
}
