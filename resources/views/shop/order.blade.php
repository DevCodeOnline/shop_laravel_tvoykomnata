@extends('layouts.layout-page')
@section('title', 'Оформление заказа')
@section('content')
    <div id="order">
        <div class="m-grid">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><span>Оформление заказа</span></li>
                </ul>
            </div>
        </div>
        <div class="m-grid">
            <div class="order-head">
                <h1>Оформление заказа</h1>
                <p>Оформите заказ, и в течение 30 минут мы перезвоним, чтобы согласовать детали</p>
            </div>
            <div class="order-body">
                <form action="{{ route('order.success') }}" method="POST">
                    @csrf
                    <div class="order-inputs">
                        <div class="order-input">
                            <label for="name">Имя</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="order-input">
                            <label for="surname">Фамилия</label>
                            <input type="text" name="surname" id="surname">
                        </div>
                        <div class="order-input">
                            <label for="phone">Телефон</label>
                            <input type="tel" name="phone" id="phone" required>
                        </div>
                        <div class="order-input">
                            <label for="email">Электронный адрес</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="order-input">
                            <label for="city">Город</label>
                            <input type="text" name="city" id="city">
                        </div>
                        <div class="order-input">
                            <label for="address">Адрес</label>
                            <input type="text" name="address" id="address">
                        </div>
                    </div>
                    <div class="order-down">
                        <div class="order-group">
                            <input type="checkbox" name="check" id="check" required>
                            <label for="check">Принимаю <a href="{{ route('terms') }}">условия обработки</a> персональных данных</label>
                        </div>
                        <div class="order-btn">
                            <input type="submit" value="Подтвердить заказ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

    </script>
@endpush
