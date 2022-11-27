@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row justify-content-center my-5">
        <div class="col-md-7 col-lg-5">
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
            </div>
            @endif
            <div class="card shadow mb-5">
                <div class="card-header text-center pt-3">
                    <h1 class="fw-bold">Login</h1>
                </div>
                <div class="card-body p-4">
                    <form action="/login" method="post">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input name="login" type="text" class="form-control" id="floatingInput" placeholder="Username or Email">
                            <label for="floatingInput">Username or Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary px-4 shadow-sm">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection