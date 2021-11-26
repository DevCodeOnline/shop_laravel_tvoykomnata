@extends('layouts.layout-home')
@section('title', $info->meta_title)
@section('description', $info->meta_description)
@section('keywords', $info->meta_keywords)
@section('content')
    <section id="main">
        <div class="main-slides">
            <div class="main-slide">
                <img src="{{ asset('assets/front/img/main-img.jpg') }}" alt="Main">
                <div class="main-overlay"></div>
                <div class="m-grid">
                    <div class="main-content">
                        <h1>Наполные покрытия в Донецке</h1>
                        <p>Керамическая плитка, ламинат и линолеум по доступным ценам в Донецке.</p>
                        <a href="{{ route('category') }}">Подробнее</a>
                    </div>
                </div>
            </div>
{{--            <div class="main-slide">--}}
{{--                <img src="{{ asset('assets/front/img/main-img.jpg') }}" alt="Main">--}}
{{--                <div class="main-overlay"></div>--}}
{{--                <div class="m-grid">--}}
{{--                    <div class="main-content">--}}
{{--                        <h2>Керамическая плитка 2</h2>--}}
{{--                        <p>Керамическая плитка и керамогранит - безоговорочные лидеры среди отделочных материалов.</p>--}}
{{--                        <a href="category.html">Подробнее</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="main-slide">--}}
{{--                <img src="{{ asset('assets/front/img/main-img.jpg') }}" alt="Main">--}}
{{--                <div class="main-overlay"></div>--}}
{{--                <div class="m-grid">--}}
{{--                    <div class="main-content">--}}
{{--                        <h2>Керамическая плитка 3</h2>--}}
{{--                        <p>Керамическая плитка и керамогранит - безоговорочные лидеры среди отделочных материалов.</p>--}}
{{--                        <a href="category.html">Подробнее</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="main-arrow">
            <div class="main-arrow__left"><img src="{{ asset('assets/front/img/left.svg') }}" alt="Left"></div>
            <div class="main-arrow__right"><img src="{{ asset('assets/front/img/right.svg') }}" alt="Right"></div>
        </div>
    </section>
    <section id="popular-cat">
        <div class="m-grid">
            <div class="popular-cat__head">
                <h2>Популярные категории</h2>
                <a href="{{ route('category') }}">Смотреть все категории</a>
            </div>
            <div class="popular-cat__body">
                @foreach($categories as $category)
                <div class="popular-cat__item">
                    <a href="{{ route('category', ['slug' => $category->slug]) }}">
                        <img src="{{ $category->getImage() }}" alt="{{ $category->title }}">
                        <div class="popular-cat__overlay"></div>
                        <div class="popular-cat__text">
                            <h4>{{ $category->title }}</h4>
                            <span>Подробнее</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="popular-cat__block">
                <p>Покупки товаров для ремонта всегда занимают достаточно много времени. Выбирая официальный сайт
                    магазина «Название» можно сэкономить массу времени благодаря целому ряду преимуществ.</p>
            </div>
        </div>
    </section>
    <section id="popular-product">
        <div class="m-grid">
            <div class="popular-product__head">
                <h2>Популярные товары</h2>
            </div>
            <div class="popular-product__body">
                @foreach($products as $product)
                <div class="popular-product__item">
                    <a href="{{ route('product', ['slug' => $product->slug]) }}">
                        <img src="{{ $product->getImage() }}" alt="{{ $product->title }}">
                        <div class="popular-product__overlay"></div>
                        <div class="popular-product__text">
                            <h4>@if(mb_strlen($product->title) > 18) {{ mb_substr($product->title, 0, 18) . "..." }} @else {{ $product->title }} @endif</h4>
                            <span>{{ $product->price }} ₽</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="parallax">
        <div class="parallax" data-parallax="scroll" data-image-src="{{ asset('assets/front/img/paralax-img.jpg') }}">
            <div class="m-grid">
                <div class="parallax-block">
                    <h2>Широкий ассортимент товара</h2>
                    <p>Керамическая плитка для ванной и кухни, ламинат, линолиум, обои, домашний текстиль</p>
                    <a href="{{ route('category') }}">
                        <span>Смотреть продукцию</span>
                        <img src="{{ asset('assets/front/img/arrow-right.svg') }}" alt="Arrow">
                    </a>
                </div>
                <div class="parallax-overlay"></div>
            </div>
        </div>
    </section>
    <section id="brand">
        <div class="brand-head">
            <h2>Бренды <span>партнеров</span></h2>
        </div>
        <div class="brand-list">
            @foreach($brands as $brand)
            <div class="brand-item">
                <a href="{{ route('brand', ['slug' => $brand->slug]) }}"><img src="{{ $brand->getImage() }}" alt="{{ $brand->title }}"></a>
            </div>
            @endforeach
            <div class="brand-item">
                <a href="{{ route('brand') }}"><span>Все бренды</span></a>
            </div>
        </div>
    </section>
    <section id="info">
        <div class="m-grid">
            <div class="info-head">
                <h2>Интернет магазин <span>«Название магазина»</span></h2>
            </div>
            <div class="info-body">
                <div class="info-img">
                    <img src="{{ asset('assets/front/img/info.jpg') }}" alt="Info">
                </div>
                <div class="info-text">
                    <p>Основа интерьера любого дома, квартиры или офисного помещения – полы. Сегодня существует большое
                        количество напольных покрытий, которые можно выбрать именно под ваш дизайн помещения. Кто-то
                        останавливается на самых известных и относительно недорогих материалах, таких как линолеум,
                        ламинат, ковролин или кафельная плитка. </p>
                    <p>Другие отдают предпочтения новинкам в мире напольных покрытий или более дорогим вариантам –
                        мармолеуму, наливным полам или паркету. Сегодня рынок наполнен разнообразными моделями и видами,
                        которые придутся на любой вкус и кошелек. </p>
                    <p>Все они будут различаться между собой по характеристикам, составу и месту использования. Пожалуй,
                        линолеум самое популярное напольное покрытие. Его можно встретить во многих квартирах и домах.
                    </p>
                    <p>Каждый желающий заменить напольное покрытие у себя дома найдет среди всего этого разнообразия
                        видов именно тот вариант, который больше всего ему подходит. При выборе стоит помнить о таких
                        характеристиках, как прочность, тепло- и звукоизоляция, огне- и износостойкость, химическая
                        инертность, гипоаллергенность.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="parallax">
        <div class="parallax" data-parallax="scroll" data-image-src="{{ asset('assets/front/img/paralax-img-two.jpg') }}">
            <div class="m-grid">
                <div class="parallax-block">
                    <h2>Контактная информация</h2>
                    <p>Местоположение магазина, номера телефонов, информации о организации</p>
                    <a href="{{ route('contact') }}">
                        <span>Страница контакты</span>
                        <img src="{{ asset('assets/front/img/arrow-right.svg') }}" alt="Arrow">
                    </a>
                </div>
                <div class="parallax-overlay"></div>
            </div>
        </div>
    </section>
    <section id="advantage">
        <div class="m-grid">
            <div class="advantage-text">
                <p>«Название» - интернет-магазин, способный помочь всем желающим создать жилье своей мечты. На одном
                    сайте каждый найдет материалы для отделки пола и стен, сможет заказать плитку, ламинат и многое
                    другое.</p>
            </div>
            <div class="advantage-list">
                <div class="advantage-item">
                    <span>01</span>
                    <h4>Широкий ассортимент</h4>
                    <p>Наш интернет-магазин напольных покрытий предоставляет вниманию покупателей любые разновидности
                        напольных покрытий.</p>
                </div>
                <div class="advantage-item">
                    <span>02</span>
                    <h4>Качественный товар</h4>
                    <p>Наш интернет-магазин напольных покрытий предоставляет вниманию покупателей любые разновидности
                        напольных покрытий.</p>
                </div>
                <div class="advantage-item">
                    <span>03</span>
                    <h4>Доставка по городу</h4>
                    <p>Наш интернет-магазин напольных покрытий предоставляет вниманию покупателей любые разновидности
                        напольных покрытий.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
@endpush
