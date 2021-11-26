@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Просмотр заказа</h1>
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
                        <div class="d-flex" style="justify-content: space-between;border-bottom: 1px solid rgba(0,0,0,.125);padding: .75rem 1.25rem;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
                            <h3 class="card-title">Заказ от - «{{ $order->name }} {{ $order->surname }}»</h3>
                            <h3 class="card-title">{{ $order->created_at}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-header border-0">
                            <h3 class="card-title">Данные</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Телефон</th>
                                    <th>Email</th>
                                    <th>Город</th>
                                    <th>Адрес</th>
                                    <th>Статус</th>
                                    <th style="text-align: right">Изменить</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->surname }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->city}}</td>
                                        <td>{{ $order->address}}</td>
                                        <td>
                                            @if($order->status == 0) Обработка @else Завершен @endif
                                        </td>
                                        <td style="text-align: right">
                                            <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
                                               class="btn btn-info btn-sm mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="card-header border-0">
                            <h3 class="card-title">Товары</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>ID - товара</th>
                                        <th>Товар</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                        <th style="text-align: right">Сумма</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->product as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <img src="{{ asset($product->getImage()) }}" alt="{{ $product->title }}" class="img-size-32 mr-2">
                                            {{ $product->title }}
                                        </td>
                                        <td>{{ $product->price }} ₽</td>
                                        <td>
                                            {{ $product->pivot->quantity }}
                                        </td>
                                        <td style="text-align: right" class="sum">
                                            <span>{{ $product->price *  $product->pivot->quantity}}</span> ₽
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <table class="table table-striped table-valign-middle">
                                    <tr>
                                        <td style="font-weight: 700;font-size: 18px">Итого:</td>
                                        <td style="font-weight: 700;font-size: 18px;text-align: right" class="all-price"><span></span> ₽</td>
                                    </tr>
                                </table>
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
@push('scripts')
    <script>
        var product = $('.sum span');
        var sum = null;

        product.each(function( index ) {
            sum += parseInt($(this).text());
        });

        $('.all-price span').html(sum);
    </script>
@endpush
