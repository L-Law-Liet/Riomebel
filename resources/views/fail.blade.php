@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.breadcrumbs' , ['name' => "Оформление заказа" , 'ancestors' => null])
	</div>
	<div class="success_wrap">
		<div class="content">
            <h1 style="text-transform: lowercase !important;" class="display-1 text-danger font-weight-bold">x</h1>
			<span class="text-danger title">{{$title}}</span>
			<span class="subtitle">Наш менеджер свяжется с Вами в ближайшее время для уточнения деталей</span>
			<a href="{{url('/')}}" class="btn-main">Вернуться на главную</a>
		</div>
	</div>
@endsection
