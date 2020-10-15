<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Paybox\Pay\Facade as Paybox;
class PayboxController extends Controller
{

    public function check($order_id) {
        $paybox = new Paybox();
        $paybox->merchant->id = config('paybox.merchant_id');
        $paybox->merchant->secretKey = config('paybox.secret_key');
        $request = (array_key_exists('pg_xml', $_REQUEST))
            ? $paybox->parseXML($_REQUEST)
            : $_REQUEST;
            $order = Order::find($order_id);
            if (!$order) {
                return $paybox->error('Заказ не найден');
            }
            return $paybox->waiting(86400);
        return $paybox->error('Не верная подпись');
    }
    public function result() {
        $paybox = new Paybox();
        $paybox->merchant->id = config('paybox.merchant_id');
        $paybox->merchant->secretKey = config('paybox.secret_key');
        $request = (array_key_exists('pg_xml', $_REQUEST))
            ? $paybox->parseXML($_REQUEST)
            : $_REQUEST;
        if($paybox->checkSig($request)) {
            $order = Order::find($request['pg_order_id']);
            $order->status = 2;
            $order->save();
            return $paybox->accept('Ok. Order will be prepared');
        }
        return $paybox->error('Не верная подпись');
    }
    public function success() {
        return redirect()->route('success');
    }
    public function fail() {
        return redirect()->route('order.fail');
    }
}
