<section id="filter">
    <form>
<div class="category_title">
	<h2 class="title">{{$title}}</h2>
	<button type="reset" id="reset_filter" class="remove_filter">Сбросить фильтры <img src="/images/icons/close_grey.svg"></button>
</div>
<div class="filter">
	<div class="custom-control custom-checkbox has_checkbox activity">
        <input name="in_stock" type="checkbox" class="ajax-filter custom-control-input" id="presence">
        <label class="custom-control-label" for="presence">В наличии</label>
    </div>

    <div class="collapse_wrap">
		<div class="dropdown filter_item">
		  	<button class="btn dropdown-toggle" type="button" id="colorFilter" data-toggle="dropdown">
		    	Цвет
		  	</button>
		  	<div class="dropdown-menu color slideIn"  aria-labelledby="colorFilter">
		    	<div class="filter_color">
                    @foreach(\App\Color::all() as $color)
                        <div class="custom-control custom-checkbox">
                            <input name="color" type="checkbox" value="{{$color->id}}" class="ajax-filter custom-control-input" id="Color{{$color->id}}">
                            <div class="color">
                                <div style="background-color: {{$color->name_en}}"></div>
                            </div>
                            <label class="custom-control-label" for="Color{{$color->id}}">{{$color->name}}</label>
                        </div>
                    @endforeach
		    	</div>
		  	</div>
		</div>
	    <div class="dropdown filter_item">
		  	<button class="btn dropdown-toggle" type="button" id="sizeFilter" data-toggle="dropdown">
		    	Размер
		  	</button>
		  	<div class="dropdown-menu slideIn"  aria-labelledby="sizeFilter">
		    	<div class="filter_size">
                    @foreach(\App\Size::all() as $size)
                        <div class="custom-control custom-radio">
                            <input id="credit{{$size->id}}" name="size" value="{{$size->id}}" type="checkbox" class="ajax-filter custom-control-input">
                            <label class="custom-control-label text-nowrap" for="credit{{$size->id}}">{{$size->name}}</label>
                        </div>
                    @endforeach
                </div>
		  	</div>
		</div>



		<div class="dropdown filter_item">
		  	<button class="btn dropdown-toggle" type="button" id="brendFilter" data-toggle="dropdown">
		    	Производитель
		  	</button>
		  	<div class="dropdown-menu slideIn"  aria-labelledby="brendFilter">
		    	<div class="filter_brand">
                    @foreach(\App\Manufactor::all() as $manufactor)
                        <div class="custom-control custom-checkbox has_checkbox">
                            <input type="checkbox" name="manufactor" value="{{$manufactor->id}}" class="ajax-filter custom-control-input" id="brand{{$manufactor->id}}">
                            <label class="custom-control-label text-nowrap" for="brand{{$manufactor->id}}">{{$manufactor->name}}</label>
                        </div>
                        @endforeach
		    	</div>
		  	</div>
		</div>



	  	<div class="dropdown filter_item">
		  	<button class="btn dropdown-toggle" type="button" id="priceFilter" data-toggle="dropdown">
		    	Цена
		  	</button>
		  	<div class="dropdown-menu slideIn"  aria-labelledby="priceFilter">
		    	<div class="filter_price">
		    		<div class="input_wrap">
		    			<p>от</p>
		    			<div class="input_text">
		    				<input type="text" name="from" class="ajax-filter form-control" placeholder="0">
		    			</div>
		    		</div>
		    		<div class="input_wrap">
		    			<p>до</p>
		    			<div class="input_text">
		    				<input type="text" name="till" class="ajax-filter form-control" placeholder="0">
		    			</div>
		    		</div>
		    	</div>
		  	</div>
		</div>
    </div>

	<div class="sort_wrap">
		<div class="dropdown filter_item">
		  	<button class="btn dropdown-toggle" type="button" id="sortFilter" data-toggle="dropdown">
		    	Сортировка
		    	<img src="/images/icons/sort.svg">
		  	</button>
		  	<div class="dropdown-menu slideIn"  aria-labelledby="sortFilter">
		    	<div class="filter_sort">
		    		<div class="custom-control custom-radio">
                        <input id="credit4" name="sort" type="radio" value="price" class="ajax-filter custom-control-input" required="">
                        <label class="custom-control-label" for="credit4">Цена по возрастанию</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit5" name="sort" type="radio" value="price_desc" class="ajax-filter custom-control-input" required="">
                        <label class="custom-control-label" for="debit5">Цена по убыванию</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal6" name="sort" type="radio" value="az" class="ajax-filter custom-control-input" required="">
                        <label class="custom-control-label" for="paypal6">По алфавиту</label>
                    </div>
		    	</div>
		  	</div>
		</div>
	</div>
</div>
    </form>
</section>
