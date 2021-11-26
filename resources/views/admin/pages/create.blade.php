@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание страницы</h1>
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
                            <h3 class="card-title">Создание страницы</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('pages.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <input type="name" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="title"
                                           placeholder="Название">
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
