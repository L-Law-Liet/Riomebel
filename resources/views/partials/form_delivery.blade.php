<form action="{{ route('formDelivery') }}" method="POST">
	@csrf
	<input type="hidden" name="delivery" value="Доставка">
	<div class="checkout_form-wrap">
		<div class="inputs_wrap">
			<span class="title">Личные данные *</span>
			<input type="text" class="form-control" placeholder="Ваше Ф. И. О." name="name">
			@if ($errors->has('name'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('name') }}</strong>
	            </span>
        	@endif
			<input type="tel" class="form-control phone_mask" placeholder="+7 (777) 000 00 00" name="phone">
			@if ($errors->has('phone'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('phone') }}</strong>
	            </span>
        	@endif
			<input type="text" class="form-control" placeholder="example@gmail.com" name="email">
			@if ($errors->has('email'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('email') }}</strong>
	            </span>
        	@endif
		</div>

		<div class="inputs_wrap">
			<span class="title">Адрес *</span>
			<select class="selectpicker select-inputs" name="city">
				<option disabled selected>Выберите город</option>
				@foreach($cities as $city)
		  		<option value="{{$city->id}}">г. {{$city->name}}</option>
		  		@endforeach
			</select>
			<input type="text" class="form-control" placeholder="Улица" name="street">
			@if ($errors->has('street'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('street') }}</strong>
	            </span>
        	@endif
			<div class="form_group">
				<input type="text" class="form-control" placeholder="Дом" name="home">
				<input type="text" class="form-control" placeholder="Квартира" name="flat">
			</div>
		</div>
	<div class="checkout_wrap">
		<span class="title">Способ оплаты</span>
		<div class="custom-control custom-radio">
            <input id="delivery_credit" name="payment" type="radio" class="custom-control-input" checked="" required="" value="card">
            <label class="custom-control-label" for="delivery_credit">Банковской картой</label>
            <span class="subtitle">Оплата банковскими картами Visa, MasterCard</span>
        </div>
        <div class="custom-control custom-radio">
            <input id="delivery_cash" name="payment" type="radio" class="custom-control-input" required="" value="cash">
            <label class="custom-control-label" for="delivery_cash">Наличными при получении</label>
            <span class="subtitle">Оплата наличными курьеру, при получении товара</span>
        </div>
	</div>
	</div>
	<button type="sumbit" class="btn-main">
		Перейти к оплате
	</button>
</form>