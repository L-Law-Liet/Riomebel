<header class="mobile">
	<div class="container">
		<section class="header_top">
			<div class="menu_wrap">
				<button class="menu mobile_menu_btn">
					<img src="/images/icons/menu_b.svg">
				</button>
				<ul class="menu_mobile">
					<li>
						<a href="{{url('/')}}">Главная</a>
					</li>
					<li>
						<a href="{{url('/')}}#contacts">Контакты</a>
					</li>
					<li>
						<a href="{{url('/')}}#about">О компании</a>
					</li>
					<li>
						<a href="{{url('/')}}#request">Оставить заявку</a>
					</li>
					<li>
						<a href="{{url('category', \App\Category::first()->slug)}}">Категории</a>
					</li>
				</ul>
			</div>

			<div class="logo">
				<a href="/">
					<img src="/images/logo.png">
				</a>
			</div>

			<div class="contacts">
				<button class="contact_btn mobile_contacts_btn">
					<img src="/images/icons/phone.svg">
				</button>
				<div class="menu_contacts_mobile">
					<button class="close"><img src="/images/icons/close_b.svg"></button>
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
					<ul class="phones_wrap">
                        @foreach(($city_id)?$selected_city->contacts:$defoult_city->contacts as $c)
                            <li>
                                <a class="" href="tel:{{$c->phone}}"> {{$c->phone}}</a>
                            </li>
                        @endforeach
					</ul>
					<ul class="emails">
						<li>
							<p>
                                @if ($city_id == null)
                                    {{$defoult_city->mail}}
                                @else
                                    {{$selected_city->mail}}
                                @endif
                            </p>
						</li>
					</ul>
				</div>
			</div>
		</section>

		<div class="header_bottom">
			<form class="search-wrap" action="{{ route('search') }}" method="GET">
				<div class="form-group">
					<input type="text" name="search" class="form-control search_header" placeholder="Поиск по товарам..." value="{{ $q ?? '' }}">
					<button type="submit" class="icon"> <img src="{{asset('images/icons/search.svg')}}"> </button>
				</div>
			</form>

			<a href="{{route('favorite')}}" class="header_btn wishlist">
				<img src="{{asset('images/icons/heart.svg')}}">
			</a>
			<a href="{{ route('box') }}" class="header_btn box">
				<img src="{{asset('images/icons/supermarket.svg')}}">
                <span class="count count-product">{{$carts->count()}}</span>
			</a>
		</div>
	</div>
</header>
