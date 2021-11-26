@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование категории</h1>
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
                            <h3 class="card-title">Категория - «{{ $category->title }}»</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('categories.update', ['category' => $category->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $category->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="image">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Добавить изображение</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex mt-3" style="align-items: center;justify-content: space-between">
                                    @if($category->image)
                                        <p class="mb-0">
                                            <img style="width:50px;margin-right:10px;border: 2px solid #ddd;padding:2px;" src="{{ str_replace('\\', '/', asset(trim("uploads/$category->image"))) }}" alt="{{$category->title}}">
                                            <span>{{ str_replace('\\', '/', asset(trim("uploads/$category->image"))) }}</span>
                                        </p>
                                    @else
                                        <p class="mb-0">Основное изображение - не заполнено</p>
                                    @endif
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="text">Описание категории</label>
                                    <textarea type="text" name="text"
                                              class="form-control @error('text') is-invalid @enderror" id="text"
                                              placeholder="Описание категории" rows="5">{{ $category->text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Родительская категория</label>
                                    <select class="form-control" name="parent" id="parent" data-placeholder="Выберите родительскую категорию" autocomplete="off">
                                        <option value="0" @if($category->parent == 0) selected @endif>Главная категория</option>
                                        @foreach($categories as $k => $v)
                                            <option value="{{ $k }}" @if($k == $category->parent) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Популярная категория</label>
                                    <select class="form-control" name="popular" id="popular" data-placeholder="Это популярная категория?" autocomplete="off">
                                        <option value="0" @if(!$category->popular) selected @endif >Нет</option>
                                        <option value="1" @if($category->popular) selected @endif>Да</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="meta-title">Мета-заголовок</label>
                                    <input type="text" name="meta-title"
                                           class="form-control @error('meta-title') is-invalid @enderror" id="meta-title"
                                           value="{{ $category->meta_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta-description">Мета-описание</label>
                                    <textarea type="text" name="meta-description"
                                              class="form-control @error('meta-description') is-invalid @enderror" id="meta-description"
                                              placeholder="Мета-описание">{{ $category->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta-keywords">Мета-ключи <small>(через запятую)</small></label>
                                    <input type="text" name="meta-keywords"
                                           class="form-control @error('meta-keywords') is-invalid @enderror" id="meta-keywords"
                                           value="{{ $category->meta_keywords }}">
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

