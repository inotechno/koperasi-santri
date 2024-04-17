@extends('layout-auth.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
                <div>
                    <a href="index.html" class="d-inline-block auth-logo">
                        <img src="assets/images/logo-light.png" alt="" height="20">
                    </a>
                </div>
                <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
                <div class="card-body p-4 text-center">
                    <div class="avatar-lg mx-auto mt-2">
                        <div class="avatar-title bg-light text-success display-3 rounded-circle">
                            <i class="ri-checkbox-circle-fill"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-2">
                        <h4>Verification !</h4>
                        <p class="text-muted mx-4">Verifikasi email diperlukan !</p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('message') }}
                            </div>
                        @else
                            <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                                @csrf
                                <button type="submit" class="btn btn-primary">Resend verification email</button>
                            </form>
                        @endif
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
    </div>
@endsection
