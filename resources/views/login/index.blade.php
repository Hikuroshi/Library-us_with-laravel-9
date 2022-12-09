@extends('layouts.main')

@section('container')
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12 m-auto">
            <div id="auth-left">
                @if (session()->has('loginError'))
                <div class="alert alert-light-danger alert-dismissible fade show mb-5 text-center" role="alert">
                    {{ session('loginError') }}
                </div>
                @endif
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                
                <form action="/login" method="POST">
                    @csrf
                    
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Username or Email" name="login">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Don't have an account? <a href="/register" class="font-bold">Sign up</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection