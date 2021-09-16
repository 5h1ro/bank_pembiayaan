@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light"
                                    src="{{ asset('assets/images/logo/login.png') }}" alt="looginpage"><img
                                    class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form method="POST" action="{{ route('loginpost') }}" class="theme-form">
                                {{ csrf_field() }}
                                <h4>Masuk Ke Akun Anda</h4>
                                <p>Masukkan Email dan Sandi Anda</p>
                                <div class="form-group">
                                    <label class="col-form-label">Alamat Email</label>
                                    <input class="form-control" type="email" required="" name="email"
                                        placeholder="Test@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Kata Sandi</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                    <div class="mt-3 show-hide"><span class="show"></span></div>
                                </div>
                                <div class="form-group mb-0 d-flex justify-content-start mt-3">
                                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                </div>
                                <p class="mt-4 mb-0">Lupa Kata Sandi?<a class="ms-2"
                                        href="{{ route('password.request') }}">Lupa Sandi</a></p>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
