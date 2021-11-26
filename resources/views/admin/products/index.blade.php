@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mb-3">
                    <h1>Товары</h1>
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
                        <div class="card-header d-flex" style="justify-content: space-between; align-items: center">
                            <h3 class="card-title">Список товаров</h3>
                            <div class="form-group d-flex mb-0" style="width: 445px;justify-content: space-between;align-items: center;margin-left: auto;" >
                                <form class="d-flex" role="form" method="post" action="{{ route('product.import') }}" enctype="multipart/form-data" style="width: 100%;justify-content: space-between; align-items: center">
                                    @csrf
                                    <div>
                                        <div class="form-group mb-0" style="display: flex;align-items: center;">
                                            <div class="custom-file" style="width: 300px">
                                                <input type="file" name="products_import" class="custom-file-input" id="products_import" style="width: 0">
                                                <label class="custom-file-label" for="products_import">Загрузить товары (Excel)</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary ml-5">Загрузить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить
                                товар</a>
                            @if (count($products))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 80px">ID</th>
                                            <th>Наименование</th>
                                            <th>Slug</th>
                                            <th style="width: 120px">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->slug }}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('products.destroy', ['product' => $product->id]) }}"
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
                                <p>Товаров пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                        <hr>
                        <div class="card-header d-flex" style="justify-content: space-between; align-items: center">
                            <h4 class="card-title">Удалить товары</h4>
                            <div class="form-group d-flex mb-0" style="width: 445px;justify-content: space-between;align-items: center;margin-left: auto;" >
                                <form class="d-flex" role="form" method="post" action="{{ route('product.delete.import') }}" enctype="multipart/form-data" style="width: 100%;justify-content: space-between; align-items: center">
                                    @csrf
                                    <div>
                                        <div class="form-group mb-0" style="display: flex;align-items: center;">
                                            <div class="custom-file" style="width: 300px">
                                                <input type="file" name="products_delete_import" class="custom-file-input" id="products_delete_import" style="width: 0">
                                                <label class="custom-file-label" for="products_delete_import">Удалить товары (Excel)</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary ml-5">Загрузить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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

