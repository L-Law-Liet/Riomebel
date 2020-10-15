<div class="filter_collapse-wrap" id="filter-collapse">
	<form action="">
		<ul class="accordion filter_collapse" id="accordionCategory">
            @foreach(\App\Category::all() as $category)
                <li>
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$category->id}}">
                        {{$category->name}}
                    </button>
                    <div id="collapse{{$category->id}}" class="collapse" data-parent="#accordionCategory">
                        <div class="checkout_radio_wrap">
                        @foreach($category->subcategory as $subcategory)
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label onclick="window.location='{{url('category', [$category->slug, $subcategory->slug])}}'" class="custom-control-label" for="credit">{{$subcategory->name}}</label>
                                </div>
                        @endforeach
                        </div>
                    </div>
                </li>
            @endforeach
		</ul>
	</form>
</div>
