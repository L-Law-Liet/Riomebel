@php
$almaty = \App\City::find(1);
$oskemen = \App\City::find(2);
@endphp
<footer>
	<div id="contacts" class="container">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-3 col-lg-3">
				<div class="logo_footer_wrap">
					<div class="logo_footer">
						<a href="/" class="img">
							<img src="/images/logo.png">
						</a>
						<a href="/" class="title">Интернет-магазин “РиО”</a>
					</div>
					<div class="phone">
                        @foreach(($city_id)?$selected_city->contacts:$defoult_city->contacts as $c)
						<a class="" href="tel:{{$c->phone}}"> {{$c->phone}}</a>
                            @endforeach
					</div>
				</div>

			</div>
			<div class="col-12 col-sm-6 col-md-3 col-lg-3">
				<div class="item">
					<h6 class="title">О НАС</h6>
					<p class="text">
						Rio mebel — это сеть мебельных салонов с 15-летней историей развития, предлагающей самый широкий выбор моделей от эконом класса до моделей из ценных пород дерева. Мы всегда будем рады подобрать по вкусу любые модели, учитывая Ваши самые изысканные пожелания.
					</p>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-3 col-lg-3">
				<div class="item">
					<h6 class="title">{{$almaty->name}}</h6>
					<ul class="adress">
						  @foreach(\App\Address::where('city_id', $almaty->id)->get() as $address)
                            <li>
                                <p class="text">
                                    {{$address->name}}
                                    @foreach($address->relCity->contacts as $cont)
                                        {{$cont->phone}}
                                        @endforeach
                                </p>
                            </li>
                            @endforeach
						<li>
							<p class="text"> E-mail:
                            @foreach($almaty->contacts as $cont)
                                    @if($cont->mail)
                                        {{$cont->mail}}
                                    @endif
                                @endforeach
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-3 col-lg-3">
				<div class="item">
					<h6 class="title">{{$oskemen->name}}</h6>
					<ul class="adress">
						@foreach(\App\Address::where('city_id', $oskemen->id)->get() as $address)
                            <li>
                                <p class="text">
                                    {{$address->name}}
                                    @foreach($address->relCity->contacts as $cont)
                                        {{$cont->phone}}
                                    @endforeach
                                </p>
                            </li>
                        @endforeach
						<li>
							<p class="text">
                                E-mail:
                            @foreach($oskemen->contacts as $cont)
                                    @if($cont->mail)
								{{$cont->mail}}
                                    @endif
                                    @endforeach
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12">
				<div class="footer_bottom">
					<p class="year">2020, Все права защищены</p>
					<a href="https://nidge.kz" class="nidge">
						<b>Создание сайтов.</b> Разработано в <b>NIDGE Digital Agency</b>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
