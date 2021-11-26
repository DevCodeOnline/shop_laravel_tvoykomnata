@extends('layouts.layout-page')
@section('title', $info->meta_title)
@section('description', $info->meta_description)
@section('keywords', $info->meta_keywords)
@section('content')
<div id="contact">
        <div class="m-grid">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><span>Контакты</span></li>
                </ul>
            </div>
        </div>
        <div class="m-grid">
            <div class="contact-head">
                <h1>Контактные данные</h1>
            </div>
            <div class="contact-body">
                <div class="contact-items">
                    <div class="contact-item">
                        <span>Адрес</span>
                        <span>Донецкая область, г. Донецк, Ленинский проспект, д. 4</span>
                    </div>
                    <div class="contact-item">
                        <span>Время работы</span>
                        <span>Понедельник - Воскресенье с 08:00 до 20:00</span>
                    </div>
                    <div class="contact-item">
                        <span>Телефон</span>
                        <span>+38 (071) 333 77 11</span>
                    </div>
                    <div class="contact-item">
                        <span>Электронный адрес</span>
                        <span>info@my-shop.ru</span>
                    </div>
                    <div class="contact-item">
                        <span>№ счета</span>
                        <span>77212815001100029113</span>
                    </div>
                    <div class="contact-item">
                        <span>ИНН</span>
                        <span>139172391987</span>
                    </div>
                    <div class="contact-item">
                        <span>ОГРН</span>
                        <span>995106600027321</span>
                    </div>
                    <div class="contact-item">
                        <span>Дата регистрации</span>
                        <span>31.13.2021</span>
                    </div>
                </div>
            </div>
            <div class="contact-maps">
                <h2>Где мы находимся</h2>
            </div>
        </div>
        <div class="contact-frame">
            <iframe
                src="https://yandex.ru/map-widget/v1/?um=constructor%3Ad02b237833a6e60612b5d4a48160e5d3e710f363d3d64934cd7a613d121b34b5&amp;source=constructor"
                width="100%" height="400" frameborder="0"></iframe>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
