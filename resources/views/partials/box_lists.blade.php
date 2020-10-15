@if ($carts->count() > 0)
<div class="box_products">
	@foreach ($carts as $item)
	<li class="tr">
		<div class="img">
			<img src="@if($item->associatedModel->image) /storage/{{$item->associatedModel->image}} @else/images/default.jpg @endif">
		</div>
		<div class="name">
			<a href="">{{$item->name}}</a>
		</div>
		<div class="price">
			<span>{{number_format($item->price, 0, "", " ")}} ₸ </span>

			@if(!is_null($item->associatedModel->old_price) && $item->associatedModel->old_price != $item->associatedModel->new_price)
			<span class="old">{{number_format($item->associatedModel->old_price, 0, "", " ")}}  ₸</span>
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
			<span class="item"> </span><span> ₸</span>
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

