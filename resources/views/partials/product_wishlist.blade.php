@php
$wish_list = app('wishlist')->getContent();
$fav = true;
foreach ($wish_list as $item){
  if( $item->id == $product->id ){
    $fav = false;
    }
}

$carts = \Cart::getContent();
$in_box = true;
foreach ($carts as $item){
  if( $item->id == $product->id ){
    $in_box = false;
    }
}
@endphp

<div class="product_item">
    @if ($product->associatedModel->sale !== null)
        <div class="sale">
            {{$product->associatedModel->sale}}
        </div>
    @endif
    @if ($fav)
    <a
        product-id="{{ $product->id }}"
        qty="1"
        class="favorite add-wishlist">
    </a>
    @else
     <a
        product-id="{{ $product->id }}"
        qty="1"
        class="favorite remove-wishlist active el-clickable">
    </a>
    @endif
    <button class="zoom btn-modal-product" product-id="{{ $product->id }}">
        <img src="/images/icons/search_white.svg">
    </button>
    <a href="" class="img">
        <img src="@if($product->associatedModel->image) /storage/{{$product->associatedModel->image}} @else/images/default.jpg @endif">
    </a>
    <a href="{{route('product', $product->associatedModel->slug)}}">
        <h4 class="title">{{$product->name??''}}</h4>
    </a>
    <ul class="fact">
        <li><p>Производитель: {{$product->associatedModel->manufactor->name??''}}</p> </li>
        <li><p>Коллекция: {{$product->associatedModel->collection??''}}</p></li>
        <li><p>Размеры: {{$product->associatedModel->size->name??''}}</p></li>
    </ul>
    <p class="has_product active">{{($product->associatedModel->quantity > 0)?'Есть':'Нет'}} в наличии</p>

    <div class="bottom">
        <div class="price_wrap">
           <h5 class="price">{{ number_format($product->price, 0, "", " ")??'' }}  тг.</h5>

			@if(!is_null($item->associatedModel->old_price) && $product->associatedModel->old_price != $product->associatedModel->new_price)
           <h5 class="old_price">{{ $product->associatedModel->old_price }} тг</h5>
           @endif
        </div>

        @if ($in_box)
        <a  class="btn-main box-btn add-cart el-clickable"
            product-id="{{ $product->id }}"
            qty="1">В корзину</a>
        @else
        <a  class="btn-main box-btn remove-cart grey el-clickable"
            product-id="{{ $product->id }}"
            qty="1">В корзинe</a>
        @endif

        <button class="btn-main more btn-modal-product" product-id="{{ $product->id }}">Подробнее</button>
    </div>
</div>
