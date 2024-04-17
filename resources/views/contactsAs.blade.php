@extends('layout-app.app')
@section('content')
<div class="container">
    <h1 class="mb-4" style="text-align: center">Hubungi Kami</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Rumah aplikasi</h4>
                    <p>Rumah aplikasi adalah penyedia jasa pembuatan atau menjual aplikasi.</p>
                    <ul>
                        <i class="bx bx-location-plus bx-sm"></i> Location:
                        <p>Pusat Niaga Fatmawati, Cipete Utara, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus
                            Ibukota Jakarta 12150</p>
                    </ul>
                    <ul>
                        <h6><i class="ri-mail-line ri-lg"></i> Email:</h6>
                        <p>contact@koperasisantri.com</p>
                    </ul>
                    <ul>
                        <h6><i class="bx bxs-phone bx-sm"></i> Phone:</h6>
                        <p>081119931010</p>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contactUs.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        name="first_name" placeholder="First">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" placeholder="Last">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                        name="subject" placeholder="Subject">
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="nuber" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" placeholder="Phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Message</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="6" name="description"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>


</div>
@endsection
