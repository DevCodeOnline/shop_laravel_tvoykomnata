@extends('layouts.layout-page')
@section('title', $brands->meta_title)
@section('description', $brands->meta_description)
@section('keywords', $brands->meta_keywords)
@section('content')
    <div id="search">
        <div class="m-grid">
            <div class="search-wrapper">
                <div class="search-wrap">
                    <h1>Продукция бренда - «{{ $title }}»</h1>
                    <div class="search-wrap__list">
                        @foreach($products as $product)
                            <a href="{{ route('product', ['slug' => $product->slug]) }}" class="search-wrap__item">
                                <div class="search-wrap__item-img">
                                    <img src="{{ $product->getImage() }}" alt="Product">
                                </div>
                                <div class="search-wrap__item-head">
                                    <h3>{{ $product->title }}</h3>
                                </div>
                                <div class="search-wrap__item-attribute">
                                    <ul>
                                        <li><span>Цвет: </span><span>{{ $product->color }}</span></li>
                                        <li><span>Размер: </span><span>{{ $product->size }}</span></li>
                                    </ul>
                                </div>
                                <div class="search-wrap__item-prices">
                                    <span>{{ $product->price }} ₽</span>
                                    <strike>{{ $product->price * 1.15 }} ₽</strike>
                                </div>
                                <div class="search-wrap__item-btn">
                                    <span>Смотреть товар</span><img src="{{ asset('assets/front/img/right-arrow.svg') }}" alt="Right">
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{ $products->links('vendor.pagination.paginate') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
