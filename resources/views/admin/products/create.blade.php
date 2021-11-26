@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание товара</h1>
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
                            <h3 class="card-title">Создание товара</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название">
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Тескт ..." id="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Количество</label>
                                    <input type="text" name="quantity"
                                           class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                           placeholder="Количество">
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           placeholder="Цена">
                                </div>
                                <div class="form-group">
                                    <label>Бренд</label>
                                    <select class="form-control" name="brand" id="brand" data-placeholder="Бренд" autocomplete="off">
                                        <option value="0" selected>Нет бренда</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
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
                                </div>
                                <div class="form-group">
                                    <label for="image">Дополнительные изображения</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="images[]" type="file" class="custom-file-input" id="images" multiple>
                                            <label class="custom-file-label" for="images">Добавить изображения</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="size">Размер</label>
                                    <input type="text" name="size"
                                           class="form-control @error('size') is-invalid @enderror" id="size"
                                           placeholder="12.5х50">
                                </div>
                                <div class="form-group">
                                    <label for="color">Цвет</label>
                                    <input type="text" name="color"
                                           class="form-control @error('color') is-invalid @enderror" id="color"
                                           placeholder="Цвет">
                                </div>
                                <div class="form-group">
                                    <label for="category">Категория</label>
                                    <select name="categories[]" id="category" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($categories as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="similar">Похожие товары</label>
                                    <select name="similar[]" id="similar" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Наличие</label>
                                    <select class="form-control" name="stock" id="stock" data-placeholder="Товар в наличии?" autocomplete="off">
                                        <option value="1" selected>В наличии</option>
                                        <option value="0">Под заказ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Популярный товар</label>
                                    <select class="form-control" name="popular" id="popular" data-placeholder="Это популярный товар?" autocomplete="off">
                                        <option value="0" selected>Нет</option>
                                        <option value="1">Да</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="meta-title">Мета-заголовок</label>
                                    <input type="text" name="meta-title"
                                           class="form-control @error('meta-title') is-invalid @enderror" id="meta-title"
                                           placeholder="Мета-заголовок">
                                </div>
                                <div class="form-group">
                                    <label for="meta-description">Мета-описание</label>
                                    <textarea type="text" name="meta-description"
                                              class="form-control @error('meta-description') is-invalid @enderror" id="meta-description"
                                              placeholder="Мета-описание"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta-keywords">Мета-ключи <small>(через запятую)</small></label>
                                    <input type="text" name="meta-keywords"
                                           class="form-control @error('meta-keywords') is-invalid @enderror" id="meta-keywords"
                                           placeholder="Мета-ключи">
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="mb-0">Атрибуты</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    @foreach($attributes as $attr)
                                    <div class="col-3">
                                        <label for="meta-keywords">{{ $attr->title }}</label>
                                        <input type="text" name="attribute[{{$attr->id}}]"
                                               class="form-control @error("attribute[{{$attr->id}}]") is-invalid @enderror" id="attribute_{{$attr->id}}"
                                               placeholder="Атрибут - {{ $attr->title }}">
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
