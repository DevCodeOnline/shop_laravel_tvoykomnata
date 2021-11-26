@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать статус заказа</h1>
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
                            <h3 class="card-title">Статус заказа от - «{{ $order->name }} {{ $order->surname }}»</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('orders.update', ['order' => $order->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Статус заказа</label>
                                    <select class="form-control" name="status" id="status" data-placeholder="Статус заказа" autocomplete="off">
                                        <option value="0" @if($order->status == 0) selected @endif>Обработка</option>
                                        <option value="1" @if($order->status == 1) selected @endif>Завершен</option>
                                    </select>
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

