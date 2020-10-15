@extends('layouts.app')
@section('content')
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
	<div class="container">
		@include('partials.breadcrumbs', ['name' => "$product->name", 'ancestors' => null])

		<div class="row">
			<div class="col-12 col-md-12">
				<div class="title_product mobile_product_page">
                    <div class="name">
                       <span class="title">{{$product->name??''}}</span>
                        @if ($fav)
                            <a
                                product-id="{{ $product->id }}"
                                qty="1"
                                class="favorite add-wishlist el-clickable">
                            </a>
                        @else
                            <a
                                product-id="{{ $product->id }}"
                                qty="1"
                                class="favorite remove-wishlist active el-clickable">
                            </a>
                        @endif
                    </div>
                    <span class="artikul">Артикул: {{$product->articule??'Не указано'}}</span>
                    <span class="has_product">{{($product->quantity > 0)?'Есть':'Нет'}} в наличии</span>
                </div>
			</div>
			<div class="col-12 col-md-6">

				 <!-- MAIN SLIDES -->
            <div class="slider-thumbnail">
              @if($product->images)
                    @foreach($product->images as $image)
                        <figure>
                            <div class="img"><img src="@if($image){{asset('storage/'.$image)}}@else /images/default.jpg @endif" alt="One"></div>
                        </figure>
                    @endforeach
                  @else
                    <figure>
                        <div class="img"><img src="/images/default.jpg" alt="One"></div>
                    </figure>
                  @endif
            </div>

            <!-- THUMBNAILS -->
            <div class="slider-nav-thumbnail">
                @if($product->images)
                    @foreach($product->images as $image)
                        <div>
                            <div class="img"><img src="@if($image){{asset('storage/'.$image)}}@else /images/default.jpg @endif" alt="One"></div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <div class="img"><img src="/images/default.jpg" alt="One"></div>
                    </div>
                @endif
            </div>

			</div>

			<div class="col-12 col-md-6">
				<div class="product_description-wrap">
				<div class="title_product product_page">
                    <div class="name">
                       <span class="title">{{$product->name??''}}</span>
                        @if ($fav)
                            <a
                                product-id="{{ $product->id }}"
                                qty="1"
                                class="favorite add-wishlist el-clickable">
                            </a>
                        @else
                            <a
                                product-id="{{ $product->id }}"
                                qty="1"
                                class="favorite remove-wishlist active el-clickable">
                            </a>
                        @endif
                    </div>
                    <span class="artikul">Артикул: {{$product->articule??''}}</span>
                    <span class="has_product">{{($product->quantity > 0)?'Есть':'Нет'}} в наличии</span>
                </div>

                <div class="product_description">
                	<div class="nav nav-tabs" role="tablist">
					    <a class="nav-item nav-link active" data-toggle="tab" href="#product_description" role="tab">Описание</a>
					    <a class="nav-item nav-link" data-toggle="tab" href="#product_details" role="tab">Детали</a>
					    <a class="nav-item nav-link"  data-toggle="tab" href="#product_delivery" role="tab">Доставка</a>
					</div>

					<div class="tab-content">
					  <div class="tab-pane fade show active" id="product_description" role="tabpanel">
					  	<div class="text">
					  		<p>
					  			{!! $product->description !!}
					  		</p>
					  	</div>

					  	<ul class="product_details">

                            		                    <li>
                            		                        <span class="title">Размер</span>
                            		                        <span class="chapter">{{$product->size->name??''}}</span>
                            		                    </li>

{{--		                    <li>--}}
{{--		                        <span class="title">Размер</span>--}}
{{--		                        <span class="chapter">2m x 0,6m x 1,2m</span>--}}
{{--		                    </li>--}}
{{--		                    <li>--}}
{{--		                        <span class="title">Размер</span>--}}
{{--		                        <span class="chapter">2m x 0,6m x 1,2m</span>--}}
{{--		                    </li>--}}
		                </ul>

					  </div>
					  <div class="tab-pane fade" id="product_details" role="tabpanel">
					  	<ul class="product_details">
                            <li>
                                <span class="title">Размер</span>
                                <span class="chapter">{{$product->size->name??''}}</span>
                            </li>
{{--		                    <li>--}}
{{--		                        <span class="title">Размер</span>--}}
{{--		                        <span class="chapter">2m x 0,6m x 1,2m</span>--}}
{{--		                    </li>--}}
{{--		                    <li>--}}
{{--		                        <span class="title">Размер</span>--}}
{{--		                        <span class="chapter">2m x 0,6m x 1,2m</span>--}}
{{--		                    </li>--}}
		                </ul>
					  </div>
					  <div class="tab-pane fade" id="product_delivery" role="tabpanel">
					  	<ul class="product_lists">
					  		<li><p>Доставка по г. Алматы осуществляется в течение 1 дня</p></li>
					  		<li><p>Доставка по области осуществляется в течении 3 дней</p></li>
					  		<li><p>Сборка и подъём на любой этаж бесплатно</p></li>
					  	</ul>
					  </div>

					</div>

					<div class="product_page buttons_mobile">
                        @if ($in_box)
                            <a  class="btn-main box-btn add-cart"
                                product-id="{{ $product->id }}"
                                qty="1">В корзину</a>
                        @else
                            <a  class="btn-main box-btn remove-cart grey"
                                product-id="{{ $product->id }}"
                                qty="1">В корзинe</a>
                        @endif
{{--                		<button class="btn-main">Купить </button>--}}
                	</div>
                </div>
                <div class="product_page_size-wrap">
				<form>
	                <div class="product_page_size">
	                	<div class="select-inputs">
	                		<span class="title">Размеры:</span>
	                		<div class="selectpicker_wrap">
			                	<select class="selectpicker">
							  		<option value="{{$product->size_id}}">{{$product->size->name??''}}</option>
{{--							  		<option value="">2m x 0,6m x 1,2m</option>--}}
								</select>
							</div>
						</div>
						<div class="select-inputs">
	                		<span class="title">Цвета:</span>
	                			<div class="custom-control-wrap">
			                	 	<div class="custom-control custom-radio">
				                        <input id="color_red" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
				                        <label class="custom-control-label" for="color_{{$product->color->name_en??''}}">
				                        	<span style="background-color: {{$product->color->name_en??''}};"></span>
				                        </label>
			                    	</div>
{{--				                    <div class="custom-control custom-radio">--}}
{{--				                        <input id="color_green" name="paymentMethod" type="radio" class="custom-control-input" required="">--}}
{{--				                        <label class="custom-control-label" for="color_green">--}}
{{--				                        	<span style="background-color: #C7C0D6;"></span>--}}
{{--				                        </label>--}}
{{--				                    </div>--}}
{{--				                    <div class="custom-control custom-radio">--}}
{{--				                        <input id="color_blue" name="paymentMethod" type="radio" class="custom-control-input" required="">--}}
{{--				                        <label class="custom-control-label" for="color_blue">--}}
{{--				                        	<span style="background-color: #5690B3"></span>--}}
{{--				                        </label>--}}
{{--				                    </div>--}}
		                	</div>
						</div>
	                </div>
	                <span class="price_product_page">{{number_format($product->new_price, 0, "", " ")??''}} тг.</span>
                    @if ($in_box)
                        <a  class="btn-main box-btn el-clickable add-cart"
                            product-id="{{ $product->id }}"
                            qty="1">В корзину</a>
                    @else
                        <a  class="btn-main box-btn remove-cart grey"
                            product-id="{{ $product->id }}"
                            qty="1">В корзинe</a>
                    @endif

           	 	</form>
           	 	</div>
			</div>
			</div>
		</div>
	</div>
@endsection
