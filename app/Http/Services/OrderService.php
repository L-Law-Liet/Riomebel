<?php

namespace App\Http\Services;

use Cart;
use App\{ Product, Order, OrderItem };
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public static function prepareOrder($data)
    {
        $result = [];
        $result['name'] = $data['last_name']. ' ' .$data['first_name'];
        $result['email'] = $data['email'];
        $result['user_id'] = Auth::id();
        $result['phone'] = $data['phone'];
        $result['order_note'] = $data['order_note'];
        $result['status'] = 'pending';
        $result['with_delivery'] = !isset($data['pickup']);
        $result['total'] = Cart::instance('cart')->subtotal(0, '', '');
        if ($data['street'] != null)
        $result['delivery_address'] = $data['street']. ', ' .$data['city']. ', ' .$data['region']. '. ' .$data['zip'];
        return $result;
    }

    public static function prepareItems($order)
    {
        $cart_items = Cart::instance('cart')->content();
        $result = [];
        foreach ($cart_items as $index => $cart_item) {
            $product = Product::find($cart_item->id);
            $result[$index]['name'] = $product->name;
            $result[$index]['price'] = $cart_item->price;
            $result[$index]['quantity'] = $cart_item->qty;
            $result[$index]['product_id'] = $product->id;
            $result[$index]['order_id'] = $order->id;
        }
        return $result;
    }

    public static function generateMessage($order, $order_items)
    {
        $customer_name = $order->name;
        $customer_phone = $order->phone;
        $customer_email = $order->email;
        $order_note = $order->order_note;
        $delivery_address = $order->delivery_address;
        $total = $order->total;

        $list = "";
        foreach ($order_items as $order_item) {
            $list .= "\t$order_item->name";
            $list .= "\t$order_item->quantity";
            $list .= " x $order_item->price\n";
        }
        return "Имя заказчика: $customer_name\nНомер заказчика: $customer_phone\nПочта заказчика: $customer_email\nКомментарий к заказу: $order_note\nАдрес доставки: $delivery_address\n$list\nИтог: $total";
    }
}