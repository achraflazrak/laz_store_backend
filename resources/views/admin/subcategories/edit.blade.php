@extends('layouts.admin.main')

@section('title')
    Edit Subcategory
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
                                <h3 class="mt-2">Edit Subcategory</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.subcategories.update', $subcategory) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name_en" class="my-2 form-label">Name EN (*)</label>
                                            <input type="text" name="name_en" placeholder="Name EN*"
                                                value="{{ $subcategory->name_en, old('name_en') }}"
                                                class="form-control @error('name_en') is-invalid @enderror" />
                                            @error('name_en')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name_fr" class="my-2 form-label">Name FR (*)</label>
                                            <input type="text" name="name_fr" placeholder="Name FR*"
                                                value="{{ $subcategory->name_fr, old('name_fr') }}"
                                                class="form-control @error('name_fr') is-invalid @enderror" />
                                            @error('name_fr')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="category_id" class="my-2 form-label">Category (*)</label>

                                                <select name="category_id" id="category_id"
                                                    class="form-select @error('category_id') is-invalid @enderror">
                                                    <option value="" selected disabled>Choose a category</option>
                                                    @foreach ($categories as $category)
                                                    <option
                                                        @if ($subcategory->category_id === $category->id) selected @endif
                                                        value="{{ $category->id }}">{{ $category->name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
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
