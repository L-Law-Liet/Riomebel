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

<div class="title_product mobile">
    <div class="name">
       <span class="title">{{ $product->name }}</span>
        @if ($fav)
        <a class="favorite add-wishlist" qty="1" product-id="{{ $product->id }}"></a>
        @else
        <a class="favorite remove-wishlist active" qty="1" product-id="{{ $product->id }}"></a>
        @endif
    </div>
    <span class="artikul">Артикул {{$product->articul??'Не указано'}}</span>
    <span class="has_product">{{($product->quantity > 0)?'В наличии':'Нет в наличии'}}</span>
</div>


<div class="images">

    <div class="slick-modal">
        @if(json_decode($product->images))
            @foreach(json_decode($product->images) as $image)
                <div>
                    <div class="item">
                        <img src="{{asset('storage/'.$image)}}">
                    </div>
                </div>
            @endforeach
        @else
            <div>
                <div class="img"><img src="/images/default.jpg" alt="One"></div>
            </div>
        @endif
    </div>

</div>

<div class="content">
    <div class="title_product">
        <div class="name">
           <span class="title">{{ $product->name }}</span>
            @if ($fav)
            <a class="favorite add-wishlist el-clickable" qty="1" product-id="{{ $product->id }}"></a>
            @else
            <a class="favorite remove-wishlist active el-clickable" qty="1" product-id="{{ $product->id }}"></a>
            @endif
        </div>
        <span class="artikul">Артикул {{$product->articul??'Не указано'}}</span>
        <span class="has_product">{{($product->quantity > 0)?'В наличии':'Нет в наличии'}}</span>
    </div>

    <ul class="product_details">
        <li>
            <span class="title">Размер</span>
            <span class="chapter">{{$product->size->name??''}}</span>
        </li>
    </ul>
    <div class="buttons">
        @if ($in_box)
        <a  href=""
            class="btn-main box-btn add-cart"
            product-id="{{ $product->id }}"
            qty="1">В корзину</a>
        @else
        <a  href=""
            class="btn-main box-btn remove-cart grey"
            product-id="{{ $product->id }}"
            qty="1">В корзинe</a>
        @endif
        <a href="{{ route('product', $product->slug) }}" class="btn-border">Подробнее</a>
    </div>
</div>
