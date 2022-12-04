@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-7 col-lg-5 m-auto">
                <div class="card p-4">
                    <h3 class="text-center fw-bold">Tambah Admin</h3>
                    <form action="/register" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name: </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username: </label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email: </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password: </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="d-grid my-4">
                            <button class="btn btn-sm btn-primary" type="submit">Register Now</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <small>Already have an account? <a href="/login">Login here!</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection