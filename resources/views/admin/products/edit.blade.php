@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование товара</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Редактирование - {{ $product->title }}</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $product->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Тескт ..." id="description">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Количество</label>
                                    <input type="text" name="quantity"
                                           class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                           value="{{ $product->quantity }}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label>Бренд</label>
                                    <select class="form-control" name="brand" id="brand" data-placeholder="Бренд" autocomplete="off">
                                        <option value="0" @if($product->brand == 0) selected @endif>Нет бренда</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" @if($product->brand == $brand->id) selected @endif>{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Основное изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Добавить изображение</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex mt-3" style="align-items: center;justify-content: space-between">
                                        @if($product->image)
                                            <p class="mb-0">
                                                <img style="width:50px;margin-right:10px;border: 2px solid #ddd;padding:2px;" src="{{ str_replace('\\', '/', asset(trim("uploads/$product->image"))) }}" alt="{{$product->title}}">
                                                <span>{{ str_replace('\\', '/', asset(trim("uploads/$product->image"))) }}</span>
                                            </p>
                                        @else
                                            <p class="mb-0">Основное изображение - не заполнено</p>
                                        @endif
                                    </div>
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <label for="image">Дополнительные изображения</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="images[]" type="file" class="custom-file-input" id="images" multiple>
                                            <label class="custom-file-label" for="images">Добавить изображения</label>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach($product->images as $image)
                                    <div class="d-flex" style="align-items: center;justify-content: space-between">
                                        <p class="mb-0">
                                            <img style="width:50px;margin-right:10px;border: 2px solid #ddd;padding:2px;" src="{{ str_replace('\\', '/', asset(trim("uploads/$image->image"))) }}" alt="{{$product->title}}">
                                            <span>{{ str_replace('\\', '/', asset(trim("uploads/$image->image"))) }}</span>
                                        </p>
                                    </div>
                                    <hr>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label for="price">Размер</label>
                                    <input type="text" name="size"
                                           class="form-control @error('size') is-invalid @enderror" id="size"
                                           value="{{ $product->size }}">
                                </div>
                                <div class="form-group">
                                    <label for="color">Цвет</label>
                                    <input type="text" name="color"
                                           class="form-control @error('color') is-invalid @enderror" id="color"
                                           value="{{ $product->color }}">
                                </div>
                                <div class="form-group">
                                    <label for="category">Категория</label>
                                    <select name="categories[]" id="category" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($categories as $k => $v)
                                            <option value="{{ $k }}" @if($k == $product->categories->contains($k)) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="similar">Похожие товары</label>
                                    <select name="similar[]" id="similar" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($products as $item)
                                            <option value="{{ $item->id }}" @if($item->id  == $product->similar->contains($item->id )) selected @endif>{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Популярный товар</label>
                                    <select class="form-control" name="popular" id="popular" data-placeholder="Это популярный товар?" autocomplete="off">
                                        <option value="0" @if($product->popular == 0) selected @endif>Нет</option>
                                        <option value="1" @if($product->popular == 1) selected @endif>Да</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Наличие</label>
                                    <select class="form-control" name="stock" id="stock" data-placeholder="Товар в наличии?" autocomplete="off">
                                        <option value="1" @if($product->stock == 1) selected @endif>В наличии</option>
                                        <option value="0" @if($product->stock == 0) selected @endif>Под заказ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="meta-title">Мета-заголовок</label>
                                    <input type="text" name="meta-title"
                                           class="form-control @error('meta-title') is-invalid @enderror" id="meta-title"
                                           value="{{ $product->meta_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta-description">Мета-описание</label>
                                    <input type="text" name="meta-description"
                                           class="form-control @error('meta-description') is-invalid @enderror" id="meta-description"
                                           value="{{ $product->meta_description }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta-keywords">Мета-ключи <small>(через запятую)</small></label>
                                    <input type="text" name="meta-keywords"
                                           class="form-control @error('meta-keywords') is-invalid @enderror" id="meta-keywords"
                                           value="{{ $product->meta_keywords }}">
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="mb-0">Атрибуты</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                @foreach($attributes as $item)
                                            <div class="col-3">
                                                <label for="meta-keywords">{{ $item->title }}</label>
                                                <input type="text" name="attribute[{{$item->id}}]"
                                                       class="form-control @error("attribute[{{$item->id}}]") is-invalid @enderror" id="attribute_{{$item->id}}"
                                                       placeholder="Атрибут - {{ $item->title }}"
                                                @foreach($product_attributes as $attr)
                                                    @if($attr->pivot->attribute_id == $item->id)
                                                        value="{{$attr->pivot->value}}"
                                                    @endif
                                                @endforeach
                                               >
                                            </div>
                                @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
