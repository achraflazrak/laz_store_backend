@extends('layouts.admin.main')

@section('title')
    Login
@endsection

@section('styles')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <main class="form-signin text-center">
                    <form action="{{ route('admin.auth') }}" method="post">
                        @csrf
                        <img class="mb-4 rounded" src="{{ asset('imgs/logo.png') }}"
                            alt="logo" width="82" height="82">
                        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" name="remember_me" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                        <p class="mt-5 mb-3 text-muted">&copy; Laz Store {{ \Carbon\Carbon::now()->format('Y') }}</p>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
