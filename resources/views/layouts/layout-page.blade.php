<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    @stack('style')
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
</head>

<body>
<header class="page">
    <div class="h-grid">
        <div class="header-up">
            <div id="menu-click" class="header-menu">
                <img src="{{ asset('assets/front/img/menu-black.svg')}}" alt="Menu">
                <span>Меню</span>
            </div>
            <div class="header-logo">
                <a href="/">
                    <img src="{{ asset('assets/front/img/logo-black.png') }}" alt="Logo">
                </a>
            </div>
            <div class="header-icons">
                <div class="header-icons__search">
                    <img class="button-search" src="{{ asset('assets/front/img/search-black.svg') }}" alt="Search">
                    <div class="header-search">
                        <form action="{{ route('search') }}" method="GET">
                            @csrf
                            <input type="search" name="s" placeholder="Поиск по сайту">
                        </form>
                    </div>
                </div>
                <div class="header-icons__cart">
                    <a href="{{ route('cart') }}">
                        <img src="{{ asset('assets/front/img/cart-black.svg') }}" alt="Cart">
                        <span class="qnt-cart">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-line"></div>
    <div class="h-grid">
        <div class="header-down">
            <div class="header-marker">
                <img src="{{ asset('assets/front/img/marker-black.svg') }}" alt="Marker">
                <span>Донецк</span>
            </div>
            <div class="header-call">
                <div class="header-call__back">
                    <span>Обратный звонок</span>
                </div>
                <div class="header-call__phone">
                    <a href="tel:+380713337711">
                        <img src="{{ asset('assets/front/img/phone-black.svg')}}" alt="Phone">
                        <span>+38 (071) 333 77 11</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-menus">
    <div class="header-menu__close"><img class="menu-close" src="{{ asset('assets/front/img/close.svg') }}" alt="Close"></div>
    <nav>
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="{{ route('category') }}">Каталог</a></li>
            <li><a href="{{ route('contact') }}">Контакты</a></li>
            <li><a href="{{ route('about') }}">О нас</a></li>
            <li><a href="{{ route('payment') }}">Оплата</a></li>
            <li><a href="{{ route('delivery') }}">Доставка</a></li>
            <li><a href="{{ route('garant') }}">Гарантии</a></li>
        </ul>
    </nav>
</div>
@yield('content')
<footer>
    <div class="footer-up">
        <div class="m-grid">
            <div class="footer-icons">
                <div class="footer-icon">
                    <img src="{{ asset('assets/front/img/main-icon-1.svg') }}" alt="Сертифицированная продукция">
                    <h5>Сертифицированная <span>продукция</span></h5>
                </div>
                <div class="footer-icon">
                    <img src="{{ asset('assets/front/img/main-icon-2.svg') }}" alt="Режим работы">
                    <h5>Работаем без <span>выходных</span></h5>
                </div>
                <div class="footer-icon">
                    <img src="{{ asset('assets/front/img/main-icon-3.svg') }}" alt="Квалифицированные сотрудники">
                    <h5>Квалифицированные <span>сотрудники</span></h5>
                </div>
                <div class="footer-icon">
                    <img src="{{ asset('assets/front/img/main-icon-4.svg') }}" alt="Онлайн консультация">
                    <h5>Онлайн консультация <span>для клиентов</span></h5>
                </div>
                <div class="footer-icon">
                    <img src="{{ asset('assets/front/img/main-icon-5.svg') }}" alt="Доставка товара">
                    <h5>Доставка габаритного <span>товара</span></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-center">
        <div class="m-grid">
            <div class="footer-body">
                <div class="footer-menus">
                    <div class="footer-menu">
                        <h6>Каталог</h6>
                        <ul>
                            @foreach($all_categories as $category)
                                <li><a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-menu">
                        <h6>Покупателю</h6>
                        <ul>
                            <li><a href="{{ route('delivery') }}">Доставка</a></li>
                            <li><a href="{{ route('swap') }}">Возврат / обмен</a></li>
                            <li><a href="{{ route('garant') }}">Гарантии</a></li>
                            <li><a href="{{ route('payment') }}">Оплата</a></li>
                        </ul>
                    </div>
                    <div class="footer-menu">
                        <h6>Компания</h6>
                        <ul>
                            <li><a href="{{ route('about') }}">О нас</a></li>
                            <li><a href="{{ route('brand') }}">Бренды</a></li>
                            <li><a href="{{ route('contact') }}">Контакты</a></li>
                            {{--<li><a href="information.html">Гарантии</a></li>--}}
                        </ul>
                    </div>
                    <div class="footer-menu">
                        <h6>Контакты для связи</h6>
                        <ul>
                            <li><a href="tel:+380717773311">+38(071) 777 33 11</a></li>
                            <li><a href="tel:+380717773311">+38(071) 777 33 33</a></li>
                            <li><a href="mailto:info@my-shop.ru">info@my-shop.ru</a></li>
                        </ul>
                    </div>
                    <div class="footer-menu">
                        <h6>Социальные сети</h6>
                        <ul>
                            <li><a href="#">Вконтакте</a></li>
                            <li><a href="#">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-down">
            <div class="m-grid">
                <div class="footer-down__block">
                    <p>2021 © Интернет-магазин «Название»</p>
                    <p><span>Разработка сайта: </span><a href="https://art-duncan.ru/">Art Duncan</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="call-form">
    <div class="call-form__head">
        <h3>Обратный звонок</h3>
        <div class="call-form__close">
            <img src="{{ asset('assets/front/img/close.svg') }}" alt="Close">
        </div>
    </div>
    <div class="call-form__body">
        <form action="{{ route('callback') }}" method="POST">
            @csrf
            <div class="form-groups">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" placeholder="Ваше имя">
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="tel" name="phone" id="phone" placeholder="Ваш номер телефона">
                </div>
            </div>
            <div class="form-groups">
                <input type="button" value="Заказать звонок" id="call-button">
                <p>Нажимая на кнопку, вы даете согласие на обработку персональных данных</p>
            </div>

        </form>
    </div>
</div>
<div class="overlay"></div>
<script src="{{ asset('assets/front/js/scripts.js') }}"></script>
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
        cartCount();
        $('#call-button').click(function (e) {
            e.stopPropagation();
            var token = $("input[name='_token']").val();

            var name = $(".call-form__body #name").val();
            var phone = $(".call-form__body #phone").val();

            $.ajax({
                type: 'POST',
                url: '{{ route('callback')  }}',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                    name: name,
                    phone: phone,
                },
                beforeSend: function() {
                    $('#call-button').css('background', '#848484');
                },
                success: function (data) {
                    $(".call-form__body #name").val('');
                    $(".call-form__body #phone").val('');
                    setTimeout(function() {
                        $('#call-button').css('background', '#33d47b').val("Успешно");
                    }, 1000);
                    setTimeout(function() {
                        $('#call-button').css('background', '#444444').val("Заказать звонок");
                    }, 2000);
                    setTimeout(function() {
                        $('.overlay').hide();
                        $('.call-form').hide();
                    }, 2500);
                },
                error: function(result){
                    console.log(result);
                }
            });
        });
    });

</script>
@stack('scripts')
</body>

</html>
