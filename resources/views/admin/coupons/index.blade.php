@extends('layouts.admin.main')

@section('title')
    Coupons
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
                            <h3 class="mt-2">Coupons ({{ $coupons->count() }})</h3>
                            <a href="{{ route('admin.coupons.create') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Discount</th>
                                        <th>Validity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $key => $coupon)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $coupon->name }}</td>
                                            <td>{{ $coupon->discount }} %</td>
                                            <td>
                                                @if($coupon->checkIfValid())
                                                    <span class="bg-success border border-dark p-1 text-white">
                                                        Valid until {{ \Carbon\Carbon::parse($coupon->validity) }}
                                                    </span>
                                                @else
                                                    <span class="bg-danger border border-dark p-1 text-white">
                                                        Expired
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" onclick="deleteItem({{ $coupon->id }})" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <form id="{{ $coupon->id }}" action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST">
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
