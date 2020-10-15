@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.breadcrumbs' , ['name' => "Оформление заказа" , 'ancestors' => null])
	</div>
	<div class="success_wrap">
		<div class="content">
			<img src="/images/icons/success_arr.svg">
			<span class="title">Оплата успешно завершена!</span>
            <span>{{ $order->payment }}</span>
            <span>Номер заказа: №{{ $order->id }}</span>
			<span class="subtitle">Наш менеджер свяжется с Вами в ближайшее время для уточнения деталей</span>
			<a href="{{ url('/') }}" class="btn-main">Вернуться на главную</a>
		</div>
	</div>
@endsection
