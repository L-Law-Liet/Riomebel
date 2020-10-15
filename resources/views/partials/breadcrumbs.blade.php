<ul class="page-breadcrumb">
	<li>
		<a href="/" class="link">
			Главная
		</a>
	</li>
	@if($ancestors !== null)
		@foreach($ancestors as $ancestor)
	        <li><a class="link" href="{{ $ancestor->link }}">{{ $ancestor->name }}</a></li>
	   	@endforeach
   	@endif
	<li>
		<a href="/" class="link">
			{{ $name }}
		</a>
	</li>
</ul>