<?php

namespace App\Http\Controllers;
use Dosarkz\EPayAlfaBank\Facades\AlfaBank;
use Dosarkz\EPayAlfaBank\Requests\DoRegisterRequest;
use GuzzleHttp\Client;
use Mail;
use App\{ City, Order, OrderItem };
use Illuminate\Http\Request;
use App\Http\Requests\{ DeliveryRequest };
use App\Mail\{ DeliveryEmail };
use Paybox\Pay\Facade as Paybox;
use Paybox\Core\Interfaces\Pay;

class CheckoutController extends Controller
{
    public function success($paymentMethod, $id, Request $request)
    {
		 if ($paymentMethod == 'sberbank'){
        $order = Order::where('id', $id)->where('sberbank_order_id', $request->orderId)->firstOrFail();

        $data = [
            'userName'  => config('services.sberbank.userName'),
            'password'  => config('services.sberbank.password'),
            'orderId'   => $request->orderId
        ];
        $client = new Client();
        $req = $client->post(config('services.sberbank.uri') . 'getOrderStatusExtended.do',
            [
                'headers' => ['Content-type' => 'application/x-www-form-urlencoded'],
                'form_params' => $data
            ]);

        $res = json_decode($req->getBody()->getContents());

        if ($res->errorCode == 0) {
            Mail::to($order->email)->send(new DeliveryEmail($order));
            Mail::to('ira_goncharova_89@bk.ru')->send(new DeliveryEmail($order));
            Mail::to('a.kadirov.17.06@gmail.com')->send(new DeliveryEmail($order));
//            Mail::to('info@riomebel.kz')->send(new DeliveryEmail($order));
            $title = 'Успешно';
            return view('success', compact('title', 'paymentMethod', 'order'));
        }
		 }

		else if ($paymentMethod == 'cash'){
            $order = Order::find($id);
            Mail::to($order->email)->send(new DeliveryEmail($order));
            Mail::to('ira_goncharova_89@bk.ru')->send(new DeliveryEmail($order));
            Mail::to('a.kadirov.17.06@gmail.com')->send(new DeliveryEmail($order));
//            Mail::to('info@riomebel.kz')->send(new DeliveryEmail($order));
            $title = 'Успешно';
            return view('success', compact('title', 'paymentMethod', 'order'));
        }

        $title = 'Ошибка';
        if ($res->errorMessage){
            $title = $res->errorMessage;
        }

        return view('fail', compact('title'));

    }
    public function fail(Request $request)
    {
        $title = 'Ошибка';
        if ($request->get('errorMessage')){
            $title = $request->get('errorMessage');
        }
        return view('fail', compact('title'));
    }

    public function checkout()
    {
        $cities = City::all();
        $title = 'Оформить заказ';
        return view('checkout', compact('cities', 'title'));
    }

    public function delivery(DeliveryRequest $request)
    {
        $adress = "";
        if($request->has('street')){
        $adress .= "$request->street";
        }
        if ($request->has('home')){
            $adress .= ", $request->home";
        }
        if($request->has('flat')){
            $adress .= ", $request->flat";
        }
        if ($request->has('city')){
               $city = City::where('id', '=', $request->city)->first()->name;
        } else{
            $city = '';
        }
        $products = \Cart::getContent();
        $total = \Cart::getSubTotal();

        if($request->payment == 'card'){
            $payment = "Банковской картой";
        }
        else{
            $payment = "Наличными";
        }
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->city_id = $request->city??session()->get('city_id')??City::first()->id;
        $order->adress = $adress??'' ;
        $order->payment = $payment;
        $order->delivery = $request->delivery;
        $order->total = $total;
        $order->save();

        foreach ($products as $product ) {
            $order_item = new OrderItem();
            $order_item->name = $product->name;
            $order_item->price = $product->price;
            $order_item->quantity = $product->quantity;
            $order_item->order_id = $order->id;
            $order_item->product_id = $product->id;
            \Cart::remove($product->id);
            $order_item->save();
        }

        if ($request->payment == 'card')
        {
            $client = new Client();
            $data = [
                'userName' => config('services.sberbank.userName'),
                'password' => config('services.sberbank.password'),
                'orderNumber' => $order->id,
                'currency' => 398,
                'language' => 'ru',
                'amount' => $order->total * 100,
                'failUrl' => route('fail'),
                'returnUrl' => route('success', ['paymentMethod' => 'sberbank', 'id' => $order->id])
            ];
            $req = $client->post(config('services.sberbank.uri') . 'register.do',
                [
                    'headers' => ['Content-type' => 'application/x-www-form-urlencoded'],
                    'form_params' => $data
                ]);


            $res = json_decode($req->getBody()->getContents(), true);
            $order->sberbank_order_id = $res['orderId'];
            $order->save();

            if (isset($res['errorCode']))
                return redirect()->route('fail', $res);
            return redirect($res['formUrl']);
        }

        return redirect()->route('success', ['paymentMethod' => 'cash', 'id' => $order->id]);
    }
}
