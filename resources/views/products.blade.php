<section class="category_products">
<div class="row">
        @foreach($products as $product)
            <div class="col-6 col-sm-12 col-md-4">
                @include('partials.product_card', $product)
            </div>
        @endforeach
    <input type="hidden" id="phpVal" url="{{url('ajax-filter', [$page??1, $category_id, $subcategory_id??''])}}" page="{{$page}}">
    </div>
</section>
<div class="pagination-wrap">
    <ul class="pagination">
        {{$products->links()}}
    </ul>
</div>
