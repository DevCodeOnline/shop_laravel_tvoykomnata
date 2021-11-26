@extends('layouts.layout-page')
@section('title', 'Заказ оформлен')
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
                <h1>Заказ успешно оформлен</h1>
                <p style="line-height: 150%;margin-top: 20px;">Спасибо за покупку в нашем интернет-магазине!<br>Пожалуйста, подождите, наш менеджер свяжется с Вами в течение 30 минут!</p>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

    </script>
@endpush
