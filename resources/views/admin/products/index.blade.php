@extends('layouts.admin.main')

@section('title')
Products
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
                            <h3 class="mt-2">Products ({{ $products->count() }})</h3>
                            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name EN</th>
                                        <th>Name FR</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Old Price</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $product->name_en }}</td>
                                        <td>{{ $product->name_fr }}</td>
                                        <td>{{ $product->category->name_en }}</td>
                                        <td>{{ $product->subcategory->name_en }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->old_price }}</td>
                                        <td>
                                            <img src="{{ $product->thumbnail }}"
                                                width="60"
                                                height="60"
                                                alt="{{ $product->name_en }}" />
                                        </td>
                                        <td>
                                            @if ($product->status)
                                            <span class="badge bg-success p-2">
                                                In Stock
                                            </span>
                                            @else
                                            <span class="badge bg-danger p-2">
                                                Out of Stock
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product) }}"
                                                class="btn btn-sm btn-warning mb-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" onclick="deleteItem({{ $product->id }})"
                                                class="btn btn-sm btn-danger mb-1">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="{{ $product->id }}"
                                                action="{{ route('admin.products.destroy', $product) }}" method="POST">
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
