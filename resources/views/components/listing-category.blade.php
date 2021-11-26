<div class="category-wrap__list">
    @foreach($products_all as $product)
        <a href="{{ route('product', ['slug' => $product->slug]) }}" class="category-wrap__item">
            <div class="category-wrap__item-img">
                <img src="{{ $product->getImage() }}" alt="Product">
            </div>
            <div class="category-wrap__item-head">
                <h3>{{ $product->title }}</h3>
            </div>
            <div class="category-wrap__item-attribute">
                <ul>
                    <li><span>Цвет: </span><span>{{ $product->color }}</span></li>
                    <li><span>Размер: </span><span>{{ $product->size }}</span></li>
                </ul>
            </div>
            <div class="category-wrap__item-prices">
                <span>{{ $product->price }} ₽</span>
                <strike>{{ $product->price * 1.15 }} ₽</strike>
            </div>
            <div class="category-wrap__item-btn">
                <span>Смотреть товар</span><img src="{{ asset('assets/front/img/right-arrow.svg') }}" alt="Right">
            </div>
        </a>
    @endforeach
</div>

{{ $products_all->appends(['sort' => request()->sort, 'color' => request()->color, 'size' => request()->size, 'price_from' => request()->price_from, 'price_to' => request()->price_to])->links('vendor.pagination.paginate') }}
