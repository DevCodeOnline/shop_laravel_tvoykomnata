@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание атрибута</h1>
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
                            <h3 class="card-title">Создание бренда</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название">
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
                                    <label>Популярный бренд</label>
                                    <select class="form-control" name="popular" id="popular" data-placeholder="Это популярный бренд?" autocomplete="off">
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
