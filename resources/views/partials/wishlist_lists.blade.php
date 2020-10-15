@if ($wish_lists->count() > 0)
	<div class="row">
        @foreach ($wish_lists as $item)
		<div class="col-6 col-md-3">
            @include('partials.product_wishlist', ['product' => $item]) 
		</div>
        @endforeach
   </div>
@else
<div class="favorite_products_empty">
	<p>В избранном пока ничего нет</p>
	<a href="">Перейти в каталог</a>
</div>
@endif