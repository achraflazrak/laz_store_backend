@extends('layouts.admin.main')

@section('title')
Create Category
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
                                <h3 class="mt-2">Create Category</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.categories.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name_en" class="my-2 form-label">Name EN (*)</label>
                                            <input type="text" name="name_en" placeholder="Name EN*" value="{{ old('name_en') }}"
                                                class="form-control @error('name_en') is-invalid @enderror" />
                                            @error('name_en')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name_fr" class="my-2 form-label">Name FR (*)</label>
                                            <input type="text" name="name_fr" placeholder="Name FR*" value="{{ old('name_fr') }}"
                                                class="form-control @error('name_fr') is-invalid @enderror" />
                                            @error('name_fr')
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
