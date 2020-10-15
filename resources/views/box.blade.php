@php
$carts = \Cart::getContent();
$total = \Cart::getSubTotal();
$old_price  = 0;
$new_price = 0;
	foreach ($carts as $cart) {
	$old_price = $old_price + $cart->associatedModel->old_price;
	$new_price = $new_price + $cart->associatedModel->new_price;
}

$sale =  $new_price - $old_price;

@endphp

@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.breadcrumbs' , ['name' => "Корзина", 'ancestors' => null])
		<div class="row">
			<div class="col-12">
				<span class="title_page">Моя корзина</span>
			</div>
			<div class="col-12 col-md-8">
				<div class="box-html">
					@if ($carts->count() > 0)
						<div class="box_products">
							@foreach ($carts as $item)
							<li class="tr">
								<div class="img">
									<img src="@if($item->associatedModel->image) /storage/{{$item->associatedModel->image}} @else/images/default.jpg @endif">
								</div>
								<div class="name">
									<a href="{{route('product', $item->associatedModel->slug)}}">{{$item->name}}</a>
								</div>
								<div class="price">
									<span>{{number_format($item->price, 0, "", " ")}} ₸ </span>
			@if(!is_null($item->associatedModel->old_price) && $item->associatedModel->old_price != $item->associatedModel->new_price)
									<span class="old">{{number_format($item->associatedModel->old_price, 0, "", " ")}} ₸</span>
									@endif
								</div>
								<div class="count">
									<div class="wrap dropcart__product-quantity">
			                            <button class="qty-changers subs update-cart-remove" qty="{{ $item->quantity }}" row-id="{{ $item->id }}">-</button>
			                            <span class="current-qty">{{ $item->quantity }}</span>
			                            <button class="qty-changers add update-cart-add" qty="{{ $item->quantity }}" row-id="{{ $item->id }}">+</button>
		                        	</div>
								</div>
								<div class="total">
									<span class="item total_box">{{ number_format($total, 0, "", " ") }} </span><span> ₸</span>
								</div>
								<button class="delete remove-cart" product-id="{{ $item->id }}">
									<img src="/images/icons/delete.svg">
								</button>
							</li>
							@endforeach
						</div>
					@else
						<div class="box_products_empty">
							<p>В Вашей корзине пока нет товаров </p>
							<a href="">Перейти в каталог</a>
						</div>
					@endif
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="box_total">
					<span class="title_box">
						Ваша покупка
					</span>
					<ul class="details">
						<li>
							<span class="title">Товары:</span>
							<span class="count count-product">{{$carts->count()}}</span>
						</li>
						<li>
							<span class="title">Стоимость:</span>
							<span class="count"><b class="old-price">{{number_format($old_price, 0, "", " ")}}</b> ₸</span>
						</li>
						<li>
							<span class="title">Скидка:</span>
							<span class="count"><b class="sale-product">{{number_format($sale, 0, "", " ")}}</b> ₸</span>
						</li>
						<li class="total">
							<span class="title">ИТОГО:</span>
							<span class="count"><b class="total-box">{{number_format(\Cart::getSubTotal(), 0, "", " ")}}</b> ₸</span>
						</li>
					</ul>
					@if ($carts->count() > 0)
						<a href="{{ route('checkout') }}" class="btn-main">Оформить заказ</a>
					@else
						<a class="btn-main grey">Оформить заказ</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
