@extends('layouts.admin.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.admin.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h3 class="mt-2">Dashboard</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body bg-success text-white">
                                                <div class="d-flex justify-content-between">
                                                    <strong>
                                                        Today's Orders
                                                    </strong>
                                                    <span class="badge bg-white text-success fw-bold">
                                                        {{ $todayOrders->count() }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <strong>
                                                    $ {{ $todayOrders->sum('total') }}
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body bg-danger text-white">
                                                <div class="d-flex justify-content-between">
                                                    <strong>
                                                        Yesterday's Orders
                                                    </strong>
                                                    <span class="badge bg-white text-danger fw-bold">
                                                        {{ $yesterdayOrders->count() }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <strong>
                                                    $ {{ $yesterdayOrders->sum('total') }}
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body bg-primary text-white">
                                                <div class="d-flex justify-content-between">
                                                    <strong>
                                                        This Month Orders
                                                    </strong>
                                                    <span class="badge bg-white text-primary fw-bold">
                                                        {{ $monthOrders->count() }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <strong>
                                                    $ {{ $monthOrders->sum('total') }}
                                                <strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

