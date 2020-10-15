@extends('layouts.app')
@section('content')
    <section class="banner" style="background-image: url('/images/banners/banner1.webp') !important;" data-rjs="/images/banners/banner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12">
                    <div class="banner-content">
                        <h1 class="title">
                            Сеть мебельных салонов в г. Алматы
                        </h1>
                        <p class="subtitle">
                            У нас Вы найдёте все, что искали
                        </p>
                        <a href="{{url('category', \App\Category::first()->slug)}}" class="btn-main">
                            КАТАЛОГ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="categories" class="container">
        <h3 class="title-main">
            КАТЕГОРИИ
        </h3>
        <div class="category-mosaic">
            <div class="item">
                <a href="{{url('category', $categories[0]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[0]->name}}</p>
                        <span class="subtitle">Перейти</span>
                    </div>
                </a>
                <a href="{{url('category', $categories[1]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[1]->name}}</p>
                        <span class="subtitle">Перейти</span>
                    </div>
                </a>
            </div>
             <div class="item">
                <a href="{{url('category', $categories[2]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[2]->name}}</p>
                        <span class="subtitle">Перейти</span>
                    </div>
                </a>
                <a href="{{url('category', $categories[3]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[3]->name}}</p>
                        <span class="subtitle">Перейти</span>
                    </div>
                </a>
                <a href="{{url('category', $categories[4]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[4]->name}}</p>
                        <span class="subtitle">Перейти</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="category-mosaic mobile">
            <div class="item">
                <a href="{{url('category', $categories[0]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[0]->name}}</p>
                    </div>
                </a>
            </div>
            <div class="item">
                 <a href="{{url('category', $categories[1]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[1]->name}}</p>
                   </div>
                </a>
                <a href="{{url('category', $categories[2]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[2]->name}}</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="{{url('category', $categories[3]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[3]->name}}</p>
                    </div>
                </a>

                <a href="{{url('category', $categories[4]->slug)}}" class="lazy block" style="background-image: url('/images/banners/banner1.jpg');">
                    <div class="content">
                        <p class="title">{{$categories[4]->name}}</p>
                    </div>
                </a>
           </div>
        </div>
    </div>

    <div id="about" class="container">
        <h3 class="title-main">
            ПРЕИМУЩЕСТВА
        </h3>
        <div class="advantage">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="fact">
                        <div class="item">
                            <h5>438</h5>
                            <span>наименований продукции</span>
                        </div>
                        <div class="item">
                            <h5>16</h5>
                            <span>лет на рынке</span>
                        </div>
                        <div class="item">
                            <h5>10</h5>
                            <span>лет гарантии</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="content">
                        <h6 class="subtitle">
                            Мы не просто продаем <b>мебель</b> - мы помогаем Вам найти наилучшее решение
                        </h6>
                        <p class="text">
                            Наша компания на мебельном рынке уже более 15 лет. За эти годы своим достижением мы считаем то, что мы наработали надежных партнеров среди самых крупных производителей жилой мебельной продукции в Белоруссии, России, Украине, Польше, которые производят мебель по самым современным технологиям и могут дать нам самые привлекательные и оптимальные цены.
                        </p>
                        <ul class="services">
                            <li class="item">
                                <img class="lazy" src="/images/icons/delivery.svg">
                                <p class="title">
                                    ДОСТАВКА
                                </p>
                                <span class="subtitle">Доставим товар до Вашей двери</span>
                            </li>
                            <li class="item">
                                <img class="lazy" src="/images/icons/ust.svg">
                                <p class="title">
                                    УСТАНОВКА
                                </p>
                                <span class="subtitle">Соберем и установим Вашу мебель</span>
                            </li>
                            <li class="item">
                                <img class="lazy" src="/images/icons/support.svg">
                                <p class="title">
                                    КОНСУЛЬТАЦИЯ
                                </p>
                                <span class="subtitle">Наши специалисты помогут Вам в подборе</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h4 class="subtitle-main">
            ПОПУЛЯРНЫЕ ТОВАРЫ
        </h4>
        <div class="slick-welcome mb-100">
            @php
            $i = 0;
            @endphp
            @foreach ($products as $product)
                @php
                    $i++;
                @endphp
                @if($i > 10)
                    @break
                    @endif
                <div>
                    <div class="wrap_slick_item">
                        <div class="wrap-item">
                            @include('partials.product_card', ['product' => $product])
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="request" class="container">
        <div class="lazy form_welcome" data-rjs="/images/banners/divan_y.png">
            <form action="/sendemail" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="title">ОСТАВЬТЕ ЗАЯВКУ</h4>
                <p class="subtitle">
                    Вы можете отправить фото желаемой мебели или Вашей комнаты и наши дизайнеры предложат Вам оптимальные варианты.
                </p>
                <input type="text" name="name" class="form-control" placeholder="Ваше Имя">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <input type="text" name="phone" class="form-control phone_number" placeholder="Ваш Телефон">
                @if ($errors->has('phone'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
                <div class="input-file-wrap">
                    <div class="form-group">
                    <input type="file" name="file" id="file" class="input-file input-file-design">
                        <label for="file" class="btn btn-tertiary js-labelFile">
                          <span class="js-fileName">Загрузить файл</span>
                        </label>
                        @if ($errors->has('file'))
                            <span class="invalid-feedback photo" style="display: block;" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn-main">
                    Отправить
                </button>
            </form>
        </div>
    </div>

@endsection
