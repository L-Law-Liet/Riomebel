<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title??setting('site.title')}}</title>
    <meta name="description" content="{{ strip_tags((isset($description)) ? $description : setting('site.description')) }}">
    <meta name="keywords" content="{{ setting('site.keyword') }}">
    <link rel="icon" type="image/png" href="{{ asset("storage/". setting('site.logo')) }}">
    <!-- fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

 </head>
@php
    $carts = \Cart::getContent();
        $city_id = session()->get('city_id');

    $cities = \App\City::all();
    $selected_city = \App\City::where('id', $city_id)->first();
    $defoult_city = \App\City::first();
@endphp
<body>
    @include('partials.header')
    @include('partials.header_mobile')
    @yield('content')

    @include('partials.footer')

    @include('partials.modal_products')
    @include('partials.modal_city')

    <!-- js -->
    <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{ asset('js/rio/mask.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rio/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rio/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rio/ajax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rio/wishlist.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rio/cart.js') }}"></script>
    @if(!session('modalShowed'))
        <script !src="">
            $(document).ready(function () {
                setTimeout(function () {
                    $('#city-modal').modal('show');
                }, 60000);
            });
        </script>
        @endif
    @if(!empty(Session::get('message')))

    <script type="text/javascript">
         Swal.fire({
                  title: 'Успешно отправлено!',
                  text: 'Спасибо за заказ. Мы с Вами скоро свяжемся',
                  icon: 'success'
                });
    </script>
    @endif

    <script  src = "https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.2/dist/lazyload.min.js"></script>
    <script src="{{asset('js/rio/lazy-load.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
