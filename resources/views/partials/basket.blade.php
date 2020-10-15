	<div class="menu_box cart-html">
	<p class="title">Ваша корзина</p>
	@if ($carts->count() > 0)
	<ul class="products">
		@foreach ($carts as $item)
		<li class="item">
			<div class="img">
				<img src="@if($item->associatedModel->image) /storage/{{$item->associatedModel->image}} @else/images/default.jpg @endif">
			</div>
			<a href="" class="text">
				<p class="name">
					{{$item->name}}
				</p>
				<p class="price">
					{{number_format($item->price, 0, "", " ")}} тг.
				</p>
			</a>
			<button class="delete remove-cart" product-id="{{ $item->id }}">
				<img src="/images/icons/close.svg">
			</button>
		</li>
		@endforeach
	</ul>
	<div class="total">
		<p>Итог:</p>
		<p class="total-box">{{number_format(\Cart::getSubTotal(), 0, "", " ")}} тг.</p>
	</div>
	@else
        <p class="h4 text-muted text-center">
             Корзина пустая
        </p>
    @endif
    @if ($carts->count() > 0)
	<a href="{{ route('checkout') }}" class="btn-main">
		Оформить заказ
	</a>
	<a href="{{ route('box') }}" class="btn-main grey">
		Перейти в корзину
	</a>
	@endif
</div>
