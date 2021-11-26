@extends('layouts.layout-page')
@section('title', $info->meta_title)
@section('description', $info->meta_description)
@section('keywords', $info->meta_keywords)
@section('content')
<div id="brands">
        <div class="m-grid">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><span>Бренды</span></li>
                </ul>
            </div>
        </div>
        <div class="m-grid">
            <div class="brands-head">
                <h1>Бренды</h1>
            </div>
            <div class="brands-list">
                @foreach($brands as $brand)
                <a href="{{ route('brand', ['slug' => $brand->slug]) }}" class="brands-item">
                    <img src="{{ $brand->getImage() }}" alt="{{ $brand->title }}">
                    <h4>{{ $brand->title }}</h4>
                    <p>Керамическая плитка</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
