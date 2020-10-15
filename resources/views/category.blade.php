@extends('layouts.app')
@section('content')
	<div class="container">
		@include('partials.breadcrumbs' , ['name' => $title , 'ancestors' => null])
		<div class="row">
			<div class="col-12">
				@include('partials.tab_mobile_category')
			</div>
			<div class="col-12 col-sm-12 col-md-2">
				@include('partials.filter_collapse')
			</div>
			<div class="col-12 col-sm-12 col-md-10">
				@include('partials.filter')
                <div id="Resp">
                    @include('products')
                </div>
			</div>
		</div>
	</div>
@endsection
