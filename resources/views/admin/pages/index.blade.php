@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Данные для страниц</h1>
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
                            <h3 class="card-title">Список страниц</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Добавить
                                страницу</a>
                            @if (count($pages))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 80px">ID</th>
                                            <th>Наименование</th>
                                            <th style="width: 120px">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pages as $page)
                                            <tr>
                                                <td>{{ $page->id }}</td>
                                                <td>{{ $page->name }}</td>
                                                <td>
                                                    <a href="{{ route('pages.edit', ['page' => $page->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('pages.destroy', ['page' => $page->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Страниц пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $pages->links('pagination::bootstrap-4') }}
                        </div>
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

