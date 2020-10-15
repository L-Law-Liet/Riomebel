
<header class="desktop">
	<div class="top_header-wrap">
		<div class="container">
			<div class="top_header">
				<p class="email">
					@if ($city_id == null)
						{{$defoult_city->mail}}
					@else
						{{$selected_city->mail}}
					@endif
				</p>
				<ul class="links">
					<li><a href="{{route('welcome')}}">Главная</a></li>
					<li><a href="{{url('/')}}#contacts">Контакты</a></li>
					<li><a href="{{url('/')}}#about">О компании</a></li>
					<li><a href="{{url('category', \App\Category::first()->slug)}}">Категории</a></li>
				</ul>
                <a href="tel:{{($city_id)?$selected_city->contacts->first()->phone:$defoult_city->contacts->first()->phone}}" class="phone">
                    {{($city_id)?$selected_city->contacts->first()->phone:$defoult_city->contacts->first()->phone}}
                </a>
			</div>
		</div>
	</div>
	<div class="bottom_header-wrap">
		<div class="container">
			<div class="bottom_header">
				<a href="/" class="logo">
					<img src="{{asset('images/logo.png')}}">
				</a>
				<form action="{{ route('changeCity') }}" method="post">
					@csrf
					<select class="selectpicker select-inputs" name="city" onchange="this.form.submit()">
						@foreach($cities as $city)
							@if ($city->id == $city_id)
					  			<option value="{{$city->id}}" selected>г. {{$city->name}}</option>
					  		@else
					  			<option value="{{$city->id}}">г. {{$city->name}}</option>
					  		@endif
					  	@endforeach
					</select>
				</form>



                <div class="menu-item dropdown categories">
                    <button class="dropdown-toggle btn-main btn_categories" data-toggle="dropdown">
						<img src="{{asset('images/icons/bur.svg')}}">
						КАТЕГОРИИ
                    </button>
                    <ul class="dropdown-menu">
                        @foreach(\App\Category::all() as $category)
                            <li class="menu-item dropdown dropdown-submenu">
                                <a href="{{route('category', $category->slug)}}" class="dropdown-toggle link-btn">{{$category->name}}</a>
                                <ul class="dropdown-menu">
                              @foreach($category->subcategory as $subcategory)
                                        <li class="menu-item">
                                            <a href="{{route('category', [$category->slug, $subcategory->slug])}}" class="link-btn">{{$subcategory->name}}</a>
                                        </li>
                                  @endforeach
                                </ul>
                            </li>
                            @endforeach
                    </ul>
                </div>



				<form class="search-wrap" action="{{ route('search') }}" method="GET">
					<div class="form-group">
						<input type="text" name="search" class="form-control search_header" placeholder="Поиск по товарам..." value="{{ $q ?? '' }}">
						<button type="submit" class="icon"> <img src="{{asset('images/icons/search.svg')}}"> </button>
					</div>
				</form>

				<a href="{{ route('favorite') }}" class="header_btn wishlist">
					<img src="{{asset('images/icons/heart.svg')}}">
					<span class="title">Избранное</span>
				</a>

				<div class="wrap_box">
					<a href="{{ route('box') }}" class="header_btn">
						<img src="{{asset('images/icons/supermarket.svg')}}">
						<span class="title">Корзина</span>
						<span class="count count-product">{{$carts->count()}}</span>
					</a>
					@include('partials.basket')
				</div>
			</div>
		</div>
	</div>
</header>
