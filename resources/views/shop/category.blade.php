@extends('layouts.layout-page')
@if(isset($meta_title))
    @section('title', $meta_title)
@else
    @section('title', 'Каталог товаров')
@endif
@if(isset($meta_description))
    @section('description', $meta_description)
@else
    @section('description', 'Description напольных покрытий')
@endif
@if(isset($meta_keywords))
    @section('keywords', $meta_keywords)
@else
    @section('keywords', 'Keywords напольных покрытий')
@endif
@section('content')
    <div id="category">
        <div class="m-grid">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    @if($parent && $parent !== 9999)
                        <li><a href="{{ route('category') }}">Каталог</a></li>
                        <li><a href="{{ route('category', ['slug' => $parent->slug]) }}">{{ $parent->title }}</a></li>
                        <li><span>{{ $category->title }}</span></li>
                    @elseif($parent == 9999)
                        <li><a href="{{ route('category') }}">Каталог</a></li>
                        <li><span>{{ $category->title }}</span></li>
                    @else
                        <li><span>Каталог</span></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="m-grid">
            <div class="category-wrapper">
                <div class="category-filter">
                    <div class="category-filter__haed">
                        <span>Фильтр</span>
                        <div class="category-filter__close">
                            <img src="{{ asset('assets/front/img/close.svg') }}" alt="Close">
                        </div>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <input type="hidden" name="slug" value="{{ $slug }}">
                        <h6>Цена</h6>
                        <div class="form-group form-price">
                            <input type="text" name="price_from" placeholder="от 10 000 ₽">
                            <span>—</span>
                            <input type="text" name="price_to" placeholder="до 30 000 ₽">
                        </div>
                        @if($categories->count() > 0)
                        <h6>Подкатегории</h6>
                        <div class="form-group form-categories">
                            @foreach($categories as $category)
                                <div class="form-category">
                                    @if($category->slug == $slug)
                                        <label for="keram" style="cursor: default;background: #c5c5c5;">{{ $category->title }}</label>
                                    @else
                                        <a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        @endif
                        <h6>Цвет</h6>
                        <div class="form-group form-blocks">
                            @foreach($colors as $k => $v)
                                @if($v)
                                    <div class="form-block">
                                        <label for="white">{{ $v }}</label>
                                        <input type="checkbox" name="color[]" id="color_{{ $k }}" value="{{ $v }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <h6>Размер</h6>
                        <div class="form-group form-blocks">
                            @foreach($sizes as $k => $v)
                                @if($v)
                                    <div class="form-block">
                                        <label for="one-size">{{ $v }}</label>
                                        <input type="checkbox" name="size[]" id="size_{{ $k }}" value="{{ $v }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="form-btn">
                            <input type="button" value="Применить фильтр" id="btn-filter">
                        </div>
                    </form>
                </div>
                <div class="category-wrap">
                    <h1>{{ $head }}</h1>
                    @if(request('page') == null || request('page') == 1)
                        @if($category_parent->count() > 0 )
                            <div class="category-categories">
                                <h3>Подкатегории</h3>
                                <div class="popular-cat__body">
                                @foreach($category_parent as $parent)
                                    <div class="popular-cat__item">
                                        <a href="{{ route('category', ['slug' => $parent->slug]) }}">
                                            <img src="{{ $parent->getImage() }}" alt="{{ $parent->title }}">
                                            <div class="popular-cat__overlay"></div>
                                            <div class="popular-cat__text">
                                                <h4>{{ $parent->title }}</h4>
                                                <span>Подробнее</span>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="category-wrap__up">
                        <div class="category-wrap__up-filter">
                            <span class="filter-mob">Фильтр</span>
                        </div>
                        <div class="category-wrap__select">
                            <label for="sort">Соритровать по</label>
                            <select name="sort" id="sort">
                                <option value="sort[asc]" selected>По умолчанию</option>
                                <option value="title[asc]">По наименованию (А-Я)</option>
                                <option value="title[desc]">По наименованию (Я-А)</option>
                                <option name="price" value="price[asc]">По цене (возрастание)</option>
                                <option name="price" value="price[desc]">По цене (убывание)</option>
                            </select>
                        </div>
                    </div>
                    <div class="category-products">
                        <x-listing-category/>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-grid">
            <div class="category-texts">
                <div class="tabs">
                    <ul class="tabs__caption">
                        @foreach($categories as $k => $v)
                        <li @if($k == 0) class="active" @endif>
                            <h4>{{ $v->title }}</h4>
                        </li>
                        @endforeach
                    </ul>
                    @foreach($categories as $k => $v)
                        <div class="tabs__content @if($k == 0) active @endif">{{ $v->text }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
{{--Сортировка--}}
<script>
    $(document).ready(function() {

        var token = $("input[name='_token']").val();

        $('#sort').on('change', function (e) {
            e.preventDefault();

            const url = new URL(window.location);

            const sort = $(this).val();

            var price_from = $("input[name='price_from']").val();
            var price_to = $("input[name='price_to']").val();

            var color = [];

            $("input[name='color\[\]']:checked").each(function(){
                color.push($(this).val())
            });

            var size = [];

            $("input[name='size\[\]']:checked").each(function(){
                size.push($(this).val())
            });

            var slug = $("input[name='slug']").val();

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route('category.filter', ['slug' => $slug])  }}',
                data: {
                    sort: sort,
                    price_from: price_from,
                    price_to: price_to,
                    color: color,
                    size: size,
                    slug: slug,
                },
                success: function (data) {
                    $('.category-products').html(data);
                },
                error: function(result){
                    console.log(result);
                }
            });
        });
    });
</script>
<script>
$(document).ready(function () {
    var token = $("input[name='_token']").val();

    $('#btn-filter').on('click', function (e) {

    e.preventDefault();

    const sort = $('#sort option:selected').val();

    var price_from = $("input[name='price_from']").val();
    var price_to = $("input[name='price_to']").val();

    var color = [];

    $("input[name='color\[\]']:checked").each(function(){
        color.push($(this).val())
    });

    var size = [];

    $("input[name='size\[\]']:checked").each(function(){
        size.push($(this).val())
    });

    var slug = $("input[name='slug']").val();


    const url = new URL(window.location);

    $.ajax({
    type: 'POST',
    headers: {
    'X-CSRF-TOKEN': token
    },
    url: '{{ route('category.filter', ['slug' => $slug])  }}',
    data: {
        price_from: price_from,
        price_to: price_to,
        color: color,
        size: size,
        slug: slug,
        sort: sort,
    },
    success: function (data) {
        $('.category-products').html(data);
    },
    error: function(result){
    console.log(result);
    }
    });
    });
});
</script>
<script>
    function getUrlVars()
    {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');

            vars[decodeURI(hash[0])] = decodeURI(hash[1]);
        }
        return vars;
    }

    var arr = getUrlVars();

    Object.keys(arr).forEach(function(key) {
        var check = this[key];
        $("input[name='color\[\]']").each(function(){
            if($(this).val() == check) {
                $(this).prop('checked', true);
            }
        });

        $("input[name='size\[\]']").each(function(){
            if($(this).val() == check) {
                $(this).prop('checked', true);
            }
        });

    }, arr);

    var price_to = arr.price_to;
    var price_from = arr.price_from;
    var sort = arr.sort;

    $("input[name='price_from']").val(price_from);
    $("input[name='price_to']").val(price_to);

    $('#sort option').each(function () {
        if ($(this).val() == sort) {
            $(this).attr('selected', 'true');
        }
    });
</script>
@endpush
