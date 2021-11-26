@extends('layouts.layout-page')
@section('title', $info->meta_title)
@section('description', $info->meta_description)
@section('keywords', $info->meta_keywords)
@section('content')
<div id="about">
        <div class="m-grid">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><span>О компании</span></li>
                </ul>
            </div>
        </div>
        <div class="m-grid">
            <div class="about-head">
                <h1>О компании</h1>
            </div>
            <div class="about-information">
                <div class="about-information__img"><img src="{{ asset('assets/front/img/about.png') }}" alt="About"></div>
                <div class="about-information__text">
                    <p>«Название магазина» - официальный поставщий напольных покрытий в Донецке и Донецкой области. Все
                        поставляемые изделия проходят испытания на заводе изготовителе, что позволяет гарантировать
                        качество и надежную эксплуатацию в течение гарантийного срока.<br><br>На изделия «Название
                        магазина» предоставляется гарантия сроком 3 месяца с момента покупки изделия, при условии
                        соблюдения правил использования, монтажа, эксплуатации, транспортировки и хранения.</p>
                </div>
            </div>
            <div class="about-trust">
                <div class="about-trust__head">
                    <h2>Почему нам доверяют</h2>
                    <p>В своей работе мы неукоснительно соблюдаем три ключевых принципа успешного сотрудничества с
                        клиентами</p>
                </div>
                <div class="about-trust__list">
                    <div class="about-trust__item">
                        <img src="{{ asset('assets/front/img/about-i-1.svg') }}" alt="">
                        <h4>Доверие</h4>
                        <p>Каждая клиентская задача рассматривается индивидуально. Мы не просто консультируем, а
                            помогаем с выбором на каждом этапе.</p>
                    </div>
                    <div class="about-trust__item">
                        <img src="{{ asset('assets/front/img/about-i-2.svg') }}" alt="">
                        <h4>Надежность</h4>
                        <p>Мы всегда открыты и нас можно найти в любое время. Даже если выходной день, а вы хотите
                            приехать в гости - мы поможем.</p>
                    </div>
                    <div class="about-trust__item">
                        <img src="{{ asset('assets/front/img/about-i-3.svg') }}" alt="">
                        <h4>Профессионализм</h4>
                        <p>Вы получаете высокое качество обсулуживания, прозрачность всех договоренностей, внимательное
                            отношение к вашим пожеланиям.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-line"></div>
        <div class="m-grid">
            <div class="about-task">
                <div class="about-task__head">
                    <h2>Наша основная задача</h2>
                    <p>Помогать людям проявлять индивидуальность в создании актуального стильного интерьера. Мы
                        стремимся делать это доступно и комфортно.</p>
                </div>
                <div class="about-task__list">
                    <div class="about-task__item">
                        <span>15</span>
                        <p>Лет работы на рынке</p>
                    </div>
                    <div class="about-task__item">
                        <span>313</span>
                        <p>Продаж ежемесячно</p>
                    </div>
                    <div class="about-task__item">
                        <span>33</span>
                        <p>Магазина по области</p>
                    </div>
                    <div class="about-task__item">
                        <span>131</span>
                        <p>Постоянных клиентов</p>
                    </div>
                    <div class="about-task__item">
                        <span>31</span>
                        <p>Сотрудников</p>
                    </div>
                </div>
                <div class="about-task__text">
                    <p>Из небольшого оптового предприятия, созданного в 2020г. группой энтузиастов, мы выросли в
                        федеральную торгово-производственную компанию, лидера отрасли и четырежды победителя премии
                        «Марка №1 в ДНР».</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
