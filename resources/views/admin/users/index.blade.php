@extends('layouts.admin.main')

@section('title')
    Users
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
                                <h3 class="mt-2">Users ({{ $users->count() }})</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Image</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key += 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->city }}</td>
                                                <td>{{ $user->country }}</td>
                                                <td>
                                                    <img src="{{ $user->image_url }}" alt="{{ $user->name }}"
                                                        width="60" height="60" class="img-fluid rounded">
                                                </td>

                                                <td>
                                                    <a href="#" onclick="deleteItem({{ $user->id }})"
                                                        class="btn btn-sm btn-danger mb-1">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form id="{{ $user->id }}"
                                                        action="{{ route('admin.users.destroy', $user) }}" method="POST">
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
