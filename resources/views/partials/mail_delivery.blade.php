<p>Имя: {{ $order->name }}</p>
<p>Телефон: {{ $order->phone }}</p>
<p>Email: {{ $order->email }}</p>

<p>Способ оплаты: {{ $order->payment }}</p>
<p>{{ $order->delivery }}</p>
@if($order->adress)
	<p>Адрес: {{ $order->adress }}</p>
@endif

@if($order->city)
	<p>Город: {{ $order->city }}</p>
@endif

<b>Товары:</b>
@foreach($order->orderItems as $product)
	<p>{{ $product->name }} x {{ $product->quantity }}, цена: {{ $product->price }} тенге</p>
@endforeach

<p>
	<b>Итог:</b> {{ number_format($order->total, 0, "", " ") }} тенге
</p>
