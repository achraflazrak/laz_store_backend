@extends('layouts.admin.main')

@section('title')
Create Coupon
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
                                <h3 class="mt-2">Create Coupon</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.coupons.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" class="my-2 form-label">Name (*)</label>
                                            <input type="text" name="name" placeholder="Name*" value="{{ old('name') }}"
                                                class="form-control @error('name') is-invalid @enderror" />
                                            @error('name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="discount" class="my-2 form-label">Discount (*)</label>
                                            <input type="number" name="discount" placeholder="Discount*" value="{{ old('discount') }}"
                                                class="form-control @error('discount') is-invalid @enderror" />
                                            @error('discount')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="validity" class="my-2 form-label">Validity (*)</label>
                                            <input type="datetime-local" name="validity"
                                                min="{{ \Carbon\Carbon::now()->format('Y-m-d h:i:s') }}"
                                                value="{{ \Carbon\Carbon::now()->format('Y-m-d h:i:s'), old('validity') }}"
                                                placeholder="Validity*" value="{{ old('validity') }}"
                                                class="form-control @error('validity') is-invalid @enderror" />
                                            @error('validity')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row my-3">
                                        <div class="col-md-6">
                                            <button class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
