<div class="modal fade" id="city-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered city" role="document">
        <div class="modal-content city">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="/images/icons/close_grey.svg">
            </button>
            <div class="modal_city">
                <span class="title">Здравствуйте</span>
                <div class="wrap_select">
                    <span class="city">Ваш город</span>
                    <form action="{{ route('changeCity') }}" method="post">
                        @csrf
                        <select class="selectpicker select-inputs" name="city" onchange="this.form.submit()">
                            @foreach($cities as $city)
                                @if ($city->id == $city_id ?? '')
                                    <option value="{{$city->id}}" selected>г. {{$city->name}}</option>
                                @else
                                    <option value="{{$city->id}}">г. {{$city->name}}</option>
                                @endif
                            @endforeach
                        </select>
                </div>
                <div class="buttons">
                    <button  data-dismiss="modal" type="button" class="btn-border">Нет</button>
                    <button type="submit" class="btn-main">Да</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
