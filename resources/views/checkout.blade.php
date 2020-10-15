@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.breadcrumbs' , ['name' => "Оформление заказа", 'ancestors' => null])
		<div class="row">
			<div class="col-12">
				<span class="title_page">Оформление заказа</span>
			</div>
		</div>
		
		<div class="checkout">
			<div class="nav nav-tabs" role="tablist">
			    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab">Доставка</a>
			    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab">Самовывоз</a>
			</div>
			
			<div class="tab-content">
			  	<div class="tab-pane fade show active" id="nav-home" role="tabpanel">
			  		@include('partials.form_delivery')
			  	</div>
			  	<div class="tab-pane fade" id="nav-profile" role="tabpanel">
			  		@include('partials.form_pickup')
			  	</div>
			</div>
		</div>
		
	</div>
@endsection