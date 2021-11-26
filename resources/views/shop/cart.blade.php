@extends('layouts.layout-page')
@section('title', $info->meta_title)
@section('description', $info->meta_description)
@section('keywords', $info->meta_keywords)
@section('content')
    <div id="cart">
        <div class="m-grid">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><span>Корзина</span></li>
                </ul>
            </div>
        </div>
        <div class="m-grid">
            <div class="cart-head">
                <h1>Корзина Покупок</h1>
            </div>
            @if(session()->has('cart'))
            <div class="cart-list">
                <div class="cart-list__head">
                    <ul>
                        <li>Изображение</li>
                        <li>Название товара</li>
                        <li>Количество</li>
                        <li>Сумма</li>
                    </ul>
                </div>
                <div class="cart-list__items">
                    @foreach($products as $product)
                    <div class="cart-list__item">
                        <ul>
                            <input type="hidden" value="{{ $product['id'] }}" name="id" class="product-id">
                            <li class="cart-img"><img src="{{ $product['img'] }}" alt="{{ $product['title'] }}"></li>
                            <li class="cart-title">{{ $product['title'] }}</li>
                            <li class="cart-qnt"><input type="text" value="{{ $product['qnt'] }}" name="cart-qnt" class="cart-qnt cart-qnt-input"></li>
                            <li class="cart-price"><span class="price-product">{{ $product['price'] }}</span> ₽</li>
                            <li class="cart-remove"><a class="cartProductRemove" href="{{ route('cart.destroy', ['id' => $product['id']]) }}">Удалить из корзины</a></li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="cart-prices">
                <div class="cart-price">
                    <span>Итого на сумму:</span>
                    <span class="all_price">2093 ₽</span>
                </div>
                <div class="cart-btn">
                    <button class="order-btn">Оформить заказ</button>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function triplets(str) {
            return str.toString().replace(/(\d)(?=(\d{3})+([^\d]|$))/g, "$1 ");
        }

        function update_price() {
            var items = $('.cart-list__item');
            var price = 0;

            items.each(function () {
                price += parseInt($(this).find('.cart-qnt-input').val()) * parseInt($(this).find('.price-product').text());
            });

            $('.all_price').html(triplets(price) + '₽');
        }

        update_price();

        $('.order-btn').click(function (e) {
            e.preventDefault();
            var token = $("input[name='_token']").val();

            var container = [];
            var items = $('.cart-list__item');

            items.each(function () {
                container[$(this).find('.product-id').val()] = $(this).find('.cart-qnt-input').val();
            });

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route('order.order')  }}',
                data: {
                    container: container,
                },
                success: function (data) {
                    window.location.replace("order")
                },
                error: function(result){
                    console.log(result);
                }
            });
        })

        $('.cart-qnt-input').on('change', function (e) {
            update_price();
        });

    </script>
@endpush
