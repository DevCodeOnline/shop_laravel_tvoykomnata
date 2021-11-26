@extends('layouts.layout-page')
@section('title', $product->meta_title)
@section('description', $product->meta_description)
@section('keywords', $product->meta_keywords)
@section('content')
<div id="product">
{{--    <div class="m-grid">--}}
{{--        <div class="breadcrumbs">--}}
{{--            <ul>--}}
{{--                <li><a href="/">Главная</a></li>--}}
{{--                <li><a href="category.html">Каталог</a></li>--}}
{{--                <li><a href="category.html">Ламинат</a></li>--}}
{{--                <li><span>Ламинат Egger PRO Classic Дуб Азгил Светлый</span></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="m-grid">
        <div class="product-head">
            <h1>{{ $product->title }}</h1>
        </div>
        <div class="product-up">
            <div class="product-images">
                <div class="product-images__thumbs">
                    <img src="{{ $product->getImage() }}" alt="Product">
                    @foreach($product->images as $image)
                    <img src="{{ asset("uploads/{$image->image}") }}" data-src="{{ asset("uploads/{$image->image}") }}" alt="Product">
                    @endforeach
                </div>
                <div class="product-images__main" id="product-image">
                    <img src="{{ $product->getImage() }}" alt="Product">
                </div>
            </div>
            <div class="product-information">
                <div class="product-have">
                    @if($product->stock == 1)
                    <span>В наличии</span>
                    @else
                    <span>Под заказ</span>
                    @endif
                </div>
                <div class="product-attr">
                    <ul>
                        @foreach($product->attributes as $attr)
                        <li><span>{{ $attr->title }}:</span><span>{{ $attr->pivot->value }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="product-down">
                    <div class="product-prices">
                        <span>Стоимость:</span>
                        <div class="product-price">
                            <span>{{ $product->price }} ₽</span>
                            <strike>{{ $product->price * 1.15 }} ₽</strike>
                        </div>
                    </div>
                    <div class="product-qnt">
                        <label for="qnt">Количество</label>
                        <input type="text" name="qnt" id="qnt" value="1">
                        <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                    </div>
                    <div class="product-btn">
                        <a class="btn-buy">Добавить в коризну</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-description">
            <h2>Описание товара</h2>
            <p>{!! $product->description !!}</p>
        </div>
        <div class="product-similar">
            <h2>Похожие товары</h2>
            <div class="popular-product__body">
                @foreach($product->similar as $item)
                <div class="popular-product__item">
                    <a href="{{ route('product', ['slug' => $item->slug]) }}">
                        <img src="{{ $item->getImage() }}" alt="{{ $item->title }}">
                        <div class="popular-product__overlay"></div>
                        <div class="popular-product__text">
                            <h4>@if(mb_strlen($item->title) > 18) {{ mb_substr($item->title, 0, 18) . "..." }} @else {{ $item->title }} @endif</h4>
                            <span>{{ $item->price }} ₽</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        jQuery(document).ready(function ($) {
            // Thumb-slider
            $('.product-images__thumbs').slick({
                vertical: true,
                infinite: true,
                verticalSwiping: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                focusOnSelect: true,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            vertical: false,
                            verticalSwiping: false,
                        }
                    }
                ]
            });

            // Замена главного изображения

            $('.product-images__thumbs').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                var src = $('.slick-slide[data-slick-index=' + nextSlide + ']').attr("src");
                $('.product-images__main img').attr('src', src);
            });
        })
    </script>
    <script>
        jQuery(document).ready(function () {
        function cartCount() {
            $.ajax({
                url: '{{ route('cart.count') }}',
                success: function(data) {
                    $('.qnt-cart').html(data);
                }
            });
            return false;
        }

        $('.btn-buy').click(function (e) {
            e.preventDefault();
            var token = $("input[name='_token']").val();

            var id = $("input[name='id']").val();
            var qnt = $("input[name='qnt']").val();

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route('cart.add')  }}',
                data: {
                    id:  id,
                    qnt: qnt
                },
                beforeSend: function() {
                    $('.btn-buy').css('background', '#848484').html("<img src='{{ asset('assets/front/css/spinner.gif') }}'>");
                },
                success: function (data) {
                    setTimeout(function() {
                        $('.btn-buy').css('background', '#33d47b').html("Товар добавлен");
                    }, 1000);
                    cartCount();
                    setTimeout(function() {
                        $('.btn-buy').css('background', '#444444').html("Добавить в корзину");
                    }, 2000);
                },
                error: function(result){
                    console.log(result);
                }
            });
        });
        });
    </script>
@endpush
