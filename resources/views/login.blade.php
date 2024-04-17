@extends('layout-auth.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ url('/') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ url('assets') }}/images/logo-landscape.png" alt="" height="43">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ url('assets') }}/images/logo-landscape.png" alt="" height="40">
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Sign in to continue to Koperasi Santri.</p>

                        @if (session('requestVerify'))
                            <small class="text-danger"></small>
                        @endif
                    </div>
                    <div class="p-2 mt-4">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror" id="username"
                                    placeholder="Enter username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="float-end">
                                    <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                        password?</a>
                                </div>
                                <label class="form-label" for="password-input">Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" name="password"
                                        class="form-control pe-5 @error('password') is-invalid @enderror"
                                        placeholder="Enter password" id="password-input">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                <label class="form-check-label" for="auth-remember-check">Remember
                                    me</label>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-info w-100" type="submit">Sign In</button>
                            </div>

                            {{-- <div class="mt-4 text-center">
                                <div class="signin-other-title">
                                    <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i
                                            class="ri-facebook-fill fs-16"></i></button>
                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i
                                            class="ri-google-fill fs-16"></i></button>
                                    <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i
                                            class="ri-github-fill fs-16"></i></button>
                                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i
                                            class="ri-twitter-fill fs-16"></i></button>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Sign Up </a> </p>
            </div>

        </div>
    </div>
@endsection
