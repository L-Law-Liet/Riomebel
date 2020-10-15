@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.breadcrumbs', ['name' => $q, 'ancestors' => null])
		<div class="row">
			<div class="col-12">
				<span class="title_page">{{$q}}</span>
			</div>
		</div>
			<div class="favorite_products">
            @if ($products->count() > 0)
				<div class="row">
                    @foreach ($products as $item)
    				<div class="col-6 col-md-3">
                        @include('partials.product_card', ['product' => $item]) 
    				</div>
                    @endforeach
    	       </div>
            @else
			<div class="favorite_products_empty">
				<p>По вашему запросу ничего не найдено</p>
				<a href="">Перейти в каталог</a>
			</div>
            @endif
		</div>
	</div>
@endsection