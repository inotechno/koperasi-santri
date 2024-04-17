@extends('layout-app.app')
@section('css')
    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ url('assets') }}/libs/filepond/filepond.min.css" type="text/css" />
    <link rel="stylesheet"
        href="{{ url('assets') }}/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
    <style lang="scss">
        .filepond--root {
            width: 100%;
            height: auto;
            margin: 0 auto;
        }

        .select2-container--default .select2-selection--single {
            height: 50px !important;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 6px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 85% !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 26px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #CCC !important;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }

        .image-upload>input {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0">Tambah Produk</h3>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-4">
                        <h4 class=" mb-0">Data Produk</h4>
                    </div>
                    <div class="card-body p-4">


                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="title" class="form-label h5">Nama Produk</label>
                                <ul>
                                    <li><small class="text-muted">Pastikan nama produk memuat merek, tipe dan spesifikasi
                                            penting.
                                        </small></li>
                                    <li><small class="text-muted">Nama masih dapat diubah jika produk belum masuk ke
                                            transaksi.</small></li>
                                </ul>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" name="title"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror" id="title"
                                    placeholder="Nama Produk" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="product_sub_category" class="form-label h5">Kategori Produk</label>
                                {{-- <ul>
                                    <li><small class="text-muted">Pastikan nama barang memuat merek, tipe dan spesifikasi
                                            penting.
                                        </small></li>
                                    <li><small class="text-muted">Nama masih dapat diubah jika barang belum masuk ke
                                            transaksi.</small></li>
                                </ul> --}}
                            </div>
                            <div class="col-lg-8">
                                <select name="product_sub_category_id"
                                    class="form-control form-control-lg @error('product_sub_category_id') is-invalid @enderror"
                                    id="product_sub_category">
                                    <option></option>
                                    @foreach ($category as $ct)
                                        <option value="{{ $ct->id }}">
                                            {{ $ct->product_category->name . ' / ' . $ct->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_sub_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-4">
                        <h4 class=" mb-0">Detail Barang</h4>
                    </div>
                    <div class="card-body p-4">


                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="price" class="form-label h5">Harga Satuan</label>
                                <small class="text-muted d-block">Sesuaikan dengan harga pasar</small>
                            </div>
                            <div class="col-lg-8">
                                <input type="text"
                                    class="form-control form-control-lg @error('price') is-invalid @enderror" id="price"
                                    placeholder="Harga Satuan" value="{{ old('price') }}">
                                <input type="hidden" name="price">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="stock" class="form-label h5">Stok Produk</label>
                                <small class="text-muted d-block">Isi sesuai dengan yang asli.</small>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" name="stock"
                                    class="form-control form-control-lg @error('stock') is-invalid @enderror" id="stock"
                                    placeholder="Jumlah Stok" value="{{ old('stock') }}">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="minimum_order" class="form-label h5">Pembelian Minimum</label>
                                <small class="text-muted d-block">Cocok untuk kamu yang ingin jual produk eceran.</small>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" name="minimum_order"
                                    class="form-control form-control-lg @error('minimum_order') is-invalid @enderror"
                                    id="minimum_order" placeholder="Pembelian Minimum" value="{{ old('minimum_order') }}">
                                @error('minimum_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="condition" class="form-label h5">Kondisi Produk</label>
                                <small class="text-muted d-block">Isi sesuai dengan yang asli.</small>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-check form-radio-secondary form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" value="baru"
                                        id="baru">
                                    <label class="form-check-label" for="baru">
                                        Baru
                                    </label>
                                </div>
                                <div class="form-check form-radio-primary form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" value="bekas"
                                        id="bekas">
                                    <label class="form-check-label" for="bekas">
                                        Bekas
                                    </label>
                                </div>

                                @error('condition')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-4">
                        <h4 class=" mb-0">Foto Produk</h4>
                    </div>

                    <div class="card-body">

                        {{-- <input type="file" name="file"> --}}
                        <p class="text-muted">* Ukuran maksimal 5mb</p>

                        <div class="row">
                            <div class="col-lg col-md-3 mb-2 mb-xl-0">
                                <div class="image-upload">
                                    <label for="file-input1">
                                        <img id="img-preview-1" class="img-fluid"
                                            src="https://i.ibb.co/rkZhjpQ/img-upload.png" alt="img-upload"
                                            border="0">
                                    </label>

                                    <input id="file-input1" name="image1" type="file"
                                        accept="image/png, image/jpeg, image/gif" />
                                </div>
                            </div>

                            <div class="col-lg col-md-2 mb-2 mb-xl-0">
                                <div class="image-upload">
                                    <label for="file-input2">
                                        <img id="img-preview-2" class="img-fluid"
                                            src="https://i.ibb.co/rkZhjpQ/img-upload.png" alt="img-upload"
                                            border="0">
                                    </label>

                                    <input id="file-input2" name="image2" type="file"
                                        accept="image/png, image/jpeg, image/gif" />
                                </div>
                            </div>

                            <div class="col-lg col-md-2 mb-2 mb-xl-0">
                                <div class="image-upload">
                                    <label for="file-input3">
                                        <img id="img-preview-3" class="img-fluid"
                                            src="https://i.ibb.co/rkZhjpQ/img-upload.png" alt="img-upload"
                                            border="0">
                                    </label>

                                    <input id="file-input3" name="image3" type="file"
                                        accept="image/png, image/jpeg, image/gif" />
                                </div>
                            </div>

                            <div class="col-lg col-md-2 mb-2 mb-xl-0">
                                <div class="image-upload">
                                    <label for="file-input4">
                                        <img id="img-preview-4" class="img-fluid"
                                            src="https://i.ibb.co/rkZhjpQ/img-upload.png" alt="img-upload"
                                            border="0">
                                    </label>

                                    <input id="file-input4" name="image4" type="file"
                                        accept="image/png, image/jpeg, image/gif" />
                                </div>
                            </div>

                            <div class="col-lg col-md-2 mb-2 mb-xl-0">
                                <div class="image-upload">
                                    <label for="file-input5">
                                        <img id="img-preview-5" class="img-fluid"
                                            src="https://i.ibb.co/rkZhjpQ/img-upload.png" alt="img-upload"
                                            border="0">
                                    </label>

                                    <input id="file-input5" name="image5" type="file"
                                        accept="image/png, image/jpeg, image/gif" />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <ul>
                                    @error('image1')
                                        <li class="text-danger">
                                            {{ $message }}
                                        </li>
                                    @enderror

                                    @error('image2')
                                        <li class="text-danger">
                                            {{ $message }}
                                        </li>
                                    @enderror

                                    @error('image3')
                                        <li class="text-danger">
                                            {{ $message }}
                                        </li>
                                    @enderror

                                    @error('image4')
                                        <li class="text-danger">
                                            {{ $message }}
                                        </li>
                                    @enderror

                                    @error('image5')
                                        <li class="text-danger">
                                            {{ $message }}
                                        </li>
                                    @enderror
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-4">
                        <h4 class=" mb-0">Deskripsi Produk</h4>
                    </div>

                    <div class="card-body">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                            cols="30" rows="20"></textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-4">
                        <h4 class=" mb-0">Pengiriman Produk</h4>
                    </div>
                    <div class="card-body p-4">


                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="weight" class="form-label h5">Perkiraan Berat</label>
                                <small class="text-muted d-block">Jika produk atau kemasan berukuran besar, sebaiknya isi
                                    ukuran kemasan/paket untuk menghindari selisih ongkos kirim.</small>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input type="number" name="weight"
                                        class="form-control form-control-lg @error('weight') is-invalid @enderror"
                                        placeholder="Isi berat barang di sini" aria-label="Isi berat barang di sini"
                                        aria-describedby="weight-addon" value="{{ old('weight') }}">
                                    <span class="input-group-text" id="weight-addon">Gram</span>
                                </div>
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="stock" class="form-label h5">Dimensi Kemasan/Paket</label>
                                <small class="text-muted d-block">Agar perhitungan ongkos kirim lebih akurat.</small>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg mb-3 mb-xl-0">
                                        <div class="input-group">
                                            <input type="number" name="long"
                                                class="form-control form-control-lg @error('long') is-invalid @enderror"
                                                placeholder="Panjang" aria-label="Panjang" aria-describedby="long-addon"
                                                value="{{ old('long') }}">
                                            <span class="input-group-text" id="long-addon">Cm</span>
                                        </div>
                                        @error('long')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg mb-3 mb-xl-0">
                                        <div class="input-group">
                                            <input type="number" name="width"
                                                class="form-control form-control-lg @error('width') is-invalid @enderror"
                                                placeholder="Lebar" aria-label="Lebar" aria-describedby="width-addon"
                                                value="{{ old('width') }}">
                                            <span class="input-group-text" id="width-addon">Cm</span>
                                        </div>
                                        @error('width')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg mb-3 mb-xl-0">
                                        <div class="input-group">
                                            <input type="number" name="tall"
                                                class="form-control form-control-lg @error('tall') is-invalid @enderror"
                                                placeholder="Tinggi" aria-label="Tinggi" aria-describedby="tall-addon"
                                                value="{{ old('tall') }}">
                                            <span class="input-group-text" id="tall-addon">Cm</span>
                                        </div>
                                        @error('tall')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="process_time" class="form-label h5">Waktu Proses</label>
                                <small class="text-muted d-block">Dihitung sejak pesanan masuk (dibayar) hingga kirim
                                    produk (input resi).</small>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input type="number" name="process_time"
                                        class="form-control form-control-lg @error('process_time') is-invalid @enderror"
                                        placeholder="Waktu proses (hari)" aria-label="Waktu proses (hari)"
                                        aria-describedby="process_time-addon" value="{{ old('process_time') }}">
                                    <span class="input-group-text" id="process_time-addon">Hari</span>
                                </div>
                                @error('process_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="submit" name="draft_add" class="btn btn-warning">Simpan ke draf</button>
                <button type="submit" name="sell_add" class="btn btn-info">Jual & Tambah lagi</button>
                <button type="submit" class="btn btn-success">Jual</button>
            </div>
        </form>
    </div>
@endsection

@section('plugin')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="{{ asset('vendor/jquery-currency/simple.money.format.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#price').simpleMoneyFormat();
        $('#price').keyup(function(e) {
            var val = $(this).val().replace(',', '');
            $('[name="price"]').val(val);
        });

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        $("#product_sub_category").select2({
            placeholder: 'Pilih Kategori',
            allowClear: true
        });

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        $('#file-input1').change(function() {
            const file = this.files[0];
            // console.log(file);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    // console.log(event.target.result);
                    $('#img-preview-1').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        $('#file-input2').change(function() {
            const file = this.files[0];
            // console.log(file);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    // console.log(event.target.result);
                    $('#img-preview-2').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        $('#file-input3').change(function() {
            const file = this.files[0];
            // console.log(file);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    // console.log(event.target.result);
                    $('#img-preview-3').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        $('#file-input4').change(function() {
            const file = this.files[0];
            // console.log(file);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    // console.log(event.target.result);
                    $('#img-preview-4').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        $('#file-input5').change(function() {
            const file = this.files[0];
            // console.log(file);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    // console.log(event.target.result);
                    $('#img-preview-5').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        CKEDITOR.replace('description', options);
    </script>
@endsection
