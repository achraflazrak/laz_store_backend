@extends('layouts.admin.main')

@section('title')
Orders
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.admin.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h3 class="mt-2">Paid Orders ({{ $paidOrders->count() }})</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Ordered</th>
                                        <th>Picked</th>
                                        <th>Shipped</th>
                                        <th>Delivered</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paidOrders as $key => $order)
                                        @include('layouts.admin.view_order_modal')
                                        @include('layouts.admin.return_order_modal')
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->product->name_en }}</td>
                                            <td>{{ $order->product->selling_price }}</td>
                                            <td>{{ $order->qty }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                @if($order->picked_date)
                                                    <span class="badge bg-success">
                                                        {{ $order->picked_date }}
                                                    </span>
                                                @else
                                                <a href="{{ route('admin.orders.edit', [
                                                    'order' => $order,
                                                    'status' => 'picked'
                                                ]) }}" class="btn btn-link">
                                                    <i class="fa-solid fa-pencil mx-2"></i>
                                                </a>
                                                @endif
                                            </td>

                                            <td>
                                                @if($order->shipped_date)
                                                    <span class="badge bg-success">
                                                        {{ $order->shipped_date }}
                                                    </span>
                                                @else
                                                <a href="{{ route('admin.orders.edit', [
                                                    'order' => $order,
                                                    'status' => 'shipped'
                                                ]) }}" class="btn btn-link">
                                                    <i class="fa-solid fa-pencil mx-2"></i>
                                                </a>
                                                @endif
                                            </td>

                                            <td>
                                                @if($order->delivered_date)
                                                    <span class="badge bg-success">
                                                        {{ $order->delivered_date }}
                                                    </span>
                                                @else
                                                <a href="{{ route('admin.orders.edit', [
                                                    'order' => $order,
                                                    'status' => 'delivered'
                                                ]) }}" class="btn btn-link">
                                                    <i class="fa-solid fa-pencil mx-2"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-between align-items-center">
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#show_{{ $order->id }}_modal"
                                                    class="btn btn-sm btn-primary mb-1">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('admin.orders.invoice', $order) }}" class="btn btn-sm btn-success mb-1 ms-1">
                                                    <i class="fas fa-file-invoice-dollar"></i>
                                                </a>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#return_{{ $order->id }}_modal"
                                                    class="btn btn-sm btn-dark mb-1 mx-1">
                                                    <i class="fas fa-rotate-left"></i>
                                                </button>
                                                <a href="#" onclick="deleteItem({{ $order->id }})"
                                                    class="btn btn-sm btn-danger mb-1">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form id="{{ $order->id }}"
                                                    action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h3 class="mt-2">Returned Orders ({{ $returnedOrders->count() }})</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Ordered</th>
                                        <th>Picked</th>
                                        <th>Shipped</th>
                                        <th>Delivered</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($returnedOrders as $key => $order)
                                        @include('layouts.admin.view_order_modal')
                                        @include('layouts.admin.return_order_modal')
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->product->name_en }}</td>
                                            <td>{{ $order->product->selling_price }}</td>
                                            <td>{{ $order->qty }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <span class="badge bg-success">
                                                    {{ $order->picked_date }}
                                                </span>
                                            </td>

                                            <td>
                                                <span class="badge bg-success">
                                                    {{ $order->shipped_date }}
                                                </span>
                                            </td>

                                            <td>
                                                <span class="badge bg-success">
                                                    {{ $order->delivered_date }}
                                                </span>
                                            </td>
                                            <td class="d-flex justify-content-between align-items-center">
                                                <button data-bs-toggle="modal" data-bs-target="#show_{{ $order->id }}_modal"
                                                    class="btn btn-sm btn-primary mb-1">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('admin.orders.invoice', $order) }}" class="btn btn-sm btn-success mb-1 mx-1">
                                                    <i class="fas fa-file-invoice-dollar"></i>
                                                </a>
                                                <a href="#" onclick="deleteItem({{ $order->id }})" class="btn btn-sm btn-danger mb-1">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <form id="{{ $order->id }}" action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</div>
@endsection
