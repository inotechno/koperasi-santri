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
                        <h5 class="text-primary">Forgot Password?</h5>
                        <p class="text-muted">Reset password with Koperasi Santri</p>

                        <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c"
                            class="avatar-xl">
                        </lord-icon>

                    </div>

                    @error('email')
                        <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="p-2">
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email">
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-info w-100" type="submit">Send Reset Link</button>
                            </div>
                        </form><!-- end form -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Wait, I remember my password... <a href="{{ route('login') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Login here </a> </p>
            </div>

        </div>
    </div>
@endsection
