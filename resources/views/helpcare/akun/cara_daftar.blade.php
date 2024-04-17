@extends('layout-app.pusat')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/libs/glightbox/css/glightbox.min.css') }}">
@endsection

@section('content')
<div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0"></h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Akun & Keamanan</a></li>
                        <li class="breadcrumb-item active">Cara Daftar & Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<div class="container">
   
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-sm-0"> Daftar Akun Koperasi Santri</h4>
            </div>
            <ul>
                <li>
                    Bagaimana cara mendaftar akun di Koperasi Santri?
                </li>
                <p>Daftar akun Koperasi Santri. Berikut ini adalah panduan Daftar Akun Koperasi Santri:</p>
                <img src="{{ url('assets') }}/images/tutorial/daftar.png" class="img-fluid" alt="Responsive image" width="500" height="500">
            </ul>
           
          
        </div>
    </div>
</div>
@endsection
