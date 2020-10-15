<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Product };
use App\Http\Requests\{ AddCartRequest, RemoveCartRequest, UpdateCartRequest };


class CartController extends Controller
{
    public function add(AddCartRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        $price = $product->new_price;

        $model = '\App\Product';
      	\Cart::add(array(
		    'id' => $product->id,
		    'name' => $product->name,
		    'price' => intval($price),
		    'quantity' => 1,
		    'attributes' => array(),
		    'associatedModel' => $product
		));

		$total = \Cart::getSubTotal();
  		$count = \Cart::getContent()->count();
  		$carts = \Cart::getContent();

  		 return [
  		 	'cart_list'  => view('partials.box_lists_header', compact('carts'))->render(),
  		 	'box_list' => view('partials.box_lists', compact('carts'))->render(),
  		 	'total' => number_format($total, 0, "", " ")." тг.",
            'count' => $count
        ];
    }

     public function remove(RemoveCartRequest $request)
    {
        $product_id = $request->product_id;

        \Cart::remove($product_id);


        $total = \Cart::getSubTotal();
  		$count = \Cart::getContent()->count();
  		$carts = \Cart::getContent();

        $old_price  = 0;
        $new_price = 0;
        foreach ($carts as $cart) {
            $old_price = $old_price + $cart->associatedModel->old_price;
            $new_price = $new_price + $cart->associatedModel->new_price;
        }

        $sale =  $new_price - $old_price;

        return [
        	'cart_list'  => view('partials.box_lists_header', compact('carts'))->render(),
        	'box_list' => view('partials.box_lists', compact('carts'))->render(),
            'total' => number_format($total, 0, "", " ")." тг.",
            'count' => $count,
            'old_price' => number_format($old_price, 0, "", " "),
            'sale' => number_format($sale, 0, "", " ")
        ];
    }

    public function update(UpdateCartRequest $request)
    {
        $row_id = $request->row_id;
        $qty = $request->qty;

        \Cart::update($row_id, [
			'quantity'  => array(
		    'relative' => false,
		    'value' => $qty
		  ),
		]);

		$total = \Cart::getSubTotal();
        $count = \Cart::getContent()->count();

        $carts = \Cart::getContent();

        $old_price  = 0;
        $new_price = 0;
  		foreach ($carts as $cart) {
			$old_price = $old_price + $cart->associatedModel->old_price;
			$new_price = $new_price + $cart->associatedModel->new_price;
		}

		$sale =  $new_price - $old_price;

        return [
            'total' => $total,
            'count' => $count,
            'quantity' => $qty,
            'old_price' => $old_price,
            'sale' => $sale,
        ];
    }

}
