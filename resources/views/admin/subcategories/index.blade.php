@extends('layouts.admin.main')

@section('title')
    Subcategories
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
                            <h3 class="mt-2">Subcategories ({{ $subcategories->count() }})</h3>
                            <a href="{{ route('admin.subcategories.create') }}" class="btn btn-sm btn-primary">
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
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $key => $subcategory)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $subcategory->name_en }}</td>
                                            <td>{{ $subcategory->name_fr }}</td>
                                            <td>{{ $subcategory->slug }}</td>
                                            <td>{{ $subcategory->category->name_en }}</td>
                                            <td>
                                                <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" onclick="deleteItem({{ $subcategory->id }})" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <form id="{{ $subcategory->id }}" action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST">
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
