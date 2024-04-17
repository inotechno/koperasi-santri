@extends('layout-app.app')
@section('css')
    <style lang="scss">
        .select2-container--default .select2-selection--single {
            height: 40px !important;
            padding: 5px 5px;
            font-size: 14px;
            line-height: 1.50;
            border-radius: 6px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 75% !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 26px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #CCC !important;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            @if ($user->image == null)
                                <img src="{{ asset('storage/default.png') }}"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image preview-img-user"
                                    alt="user-profile-image">
                            @else
                                <img src="{{ asset('storage/user_images/' . $user->image) }}"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image preview-img-user"
                                    alt="user-profile-image">
                            @endif
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <form action="{{ route('user.update.image', $user->id) }}" method="POST" id="form-image"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="image_lama" value="{{ $user->image }}">
                                    <input id="img-user" name="image" type="file" class="profile-img-file-input">
                                    <label for="img-user" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </form>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1">{{ $user->name }}</h5>
                        <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            <!--end card-->
            @if ($user->store != null)
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                @if ($user->store->logo == null)
                                    <img src="{{ asset('storage/default.png') }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image preview-img-user"
                                        alt="user-profile-image">
                                @else
                                    <img src="{{ asset('storage/logo_images/' . $user->store->logo) }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image preview-img-store"
                                        alt="logo-image">
                                @endif
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <form action="{{ route('store.update.logo', $user->store->id) }}" method="POST"
                                        id="form-logo" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="logo_lama" value="{{ $user->store->logo }}">
                                        <input id="img-store" name="logo" type="file" class="profile-img-file-input">
                                        <label for="img-store" class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <i class="ri-camera-fill"></i>
                                            </span>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{ $user->store->name }}</h5>
                            <p class="text-muted mb-0">{{ $user->store->slug }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#rekening" role="tab">
                                Rekening
                            </a>
                        </li>
                        @hasrole('seller')
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#description" role="tab">
                                    Deskripsi Toko
                                </a>
                            </li>
                        @endrole
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="{{ route('user.update.profil', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" placeholder="Enter your name"
                                                value="{{ $user->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Nomor Telpon</label>
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                id="phone" placeholder="Enter your phone"
                                                value="{{ $user->phone }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L" @if ($user->jenis_kelamin == 'L') selected @endif>
                                                    Laki-laki
                                                </option>
                                                <option value="P" @if ($user->jenis_kelamin == 'P') selected @endif>
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                name="tanggal_lahir" id="tanggal_lahir"
                                                placeholder="Enter your tanggal lahir"
                                                value="{{ $user->tanggal_lahir }}">
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-rounded btn-primary btn-sm">Submit</button>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="{{ route('user.update.password', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Old
                                                Password*</label>
                                            <input type="password" name="password_lama"
                                                class="form-control @error('password_lama') is-invalid @enderror"
                                                id="oldpasswordInput" placeholder="Enter current password">
                                            @error('password_lama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="newpasswordInput" name="password" placeholder="Enter new password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password*</label>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="confirmpasswordInput" name="password_confirmation"
                                                placeholder="Confirm password">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a href="javascript:void(0);"
                                                class="link-primary text-decoration-underline">Forgot
                                                Password ?</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-info">Change
                                                Password</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>

                        <div class="tab-pane" id="rekening" role="tabpanel">
                            <form action="{{ route('user.update.rekening', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="bank_code" class="form-label">Nama Bank</label>
                                            <input type="hidden" name="bank_name" value="{{ $user->bank_name }}">
                                            <select name="bank_code" id="list-banks" class="bank_code">
                                                <option value=""></option>
                                                @foreach ($banks as $bank)
                                                    <option value="{{ $bank['bankCode'] }}"
                                                        data-name="{{ $bank['bankName'] }}"
                                                        {{ $user->bank_code === $bank['bankCode'] ? 'selected' : '' }}>
                                                        {{ $bank['bankCode'] . ' | ' . $bank['bankName'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('bank_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">Nomor Rekening</label>
                                            <input type="text"
                                                class="form-control @error('rekening') is-invalid @enderror"
                                                id="rekeningInput" name="rekening" placeholder="Rekening"
                                                value="{{ $user->rekening }}">
                                            @error('rekening')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="rekening_atas_nama" class="form-label">Atas Nama</label>
                                            <input type="text"
                                                class="form-control @error('rekening_atas_nama') is-invalid @enderror"
                                                id="rekening_atas_nama" name="rekening_atas_nama" placeholder="Atas Nama"
                                                value="{{ $user->rekening_atas_nama }}">
                                            @error('rekening_atas_nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>

                        @hasrole('seller')
                            <div class="tab-pane" id="description" role="tabpanel">
                                <form action="{{ route('store.update.description', $user->store->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-2">
                                        <div class="col-lg">
                                            <div>
                                                <label for="description" class="form-label">Deskripsi</label>
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                                    name="description" cols="30" rows="10">{{ $user->store->description }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        @endrole
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Alamat</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"
                                data-bs-toggle="modal" data-bs-target="#addAddressModal"><i
                                    class="ri-add-fill align-bottom me-1"></i> Tambah</a>
                        </div>
                    </div>
                    <div class="row gy-3">
                        @foreach ($user->useraddress as $item)
                            <div class="col-lg">
                                <div class="form-check card-radio">
                                    <input id="destination{{ $item->subdistrict_id }}"
                                        value="{{ $item->subdistrict_id }}" data-id="{{ $item->id }}"
                                        name="destination" type="radio" class="form-check-input"
                                        @if ($item->primary_address == 'on') checked @endif>
                                    <label class="form-check-label" for="destination{{ $item->subdistrict_id }}">
                                        <span class="mb-4 fw-semibold d-block text-muted text-uppercase">
                                            @if ($item->primary_address == 'on')
                                                Home Address
                                            @elseif($item->store_address == 'on')
                                                Store Address
                                            @else
                                                Return Address
                                            @endif
                                        </span>

                                        <span class="fs-14 mb-2 d-block">{{ $item->name }}
                                            ({{ $item->phone }})
                                        </span>
                                        <span
                                            class="text-muted fw-normal text-wrap mb-1 d-block">{{ $item->subdistrict->city->province->province_name . ', ' . $item->subdistrict->city->city_name . ', ' . $item->subdistrict->subdistrict_name }}</span>
                                        <span class="text-muted fw-normal d-block text-wrap">{{ $item->address_line1 }},
                                            {{ $item->address_line2 }}</span>
                                        <span
                                            class="text-muted fw-normal d-block">{{ $item->subdistrict->city->postal_code }}</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1">
                                    <div>
                                        <a href="#" data-id="{{ $item->id }}"
                                            class="d-block text-body p-1 px-2 btn-edit">
                                            <i class="ri-pencil-fill text-muted align-bottom me-1"></i>
                                            Edit</a>
                                    </div>
                                    <div>
                                        <a href="#" class="d-block text-body p-1 px-2 btn-remove"
                                            data-id="{{ $item->id }}"><i
                                                class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                            Remove</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!--end col-->
    </div>

    <!-- editItemModal -->
    <form action="{{ route('user.address.create') }}" method="POST" id="form-add-address">
        <div id="addAddressModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="addAddressModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAddressModalLabel">Tambah Alamat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Nama Lengkap" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">No. HP</label>
                            <input type="text" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                placeholder="Nomor Telepon" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="province_id">Provinsi</label>
                            <select name="province_id" class="form-control @error('province_id') is-invalid @enderror"
                                id="province_id" value="{{ old('province_id') }}">
                                <option></option>
                            </select>
                            @error('province_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="city_id">Kota</label>
                            <select name="city_id" class="form-control @error('city_id') is-invalid @enderror"
                                id="city_id" value="{{ old('city_id') }}">
                                <option></option>
                            </select>
                            @error('city_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subdistrict_id">Kecamatan</label>
                            <select name="subdistrict_id"
                                class="form-control @error('subdistrict_id') is-invalid @enderror" id="subdistrict_id"
                                value="{{ old('subdistrict') }}">
                                <option value=""></option>
                            </select>
                            @error('subdistrict_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address_line1" class="form-label">Alamat Utama</label>
                            <textarea name="address_line1" class="form-control @error('address_line1') is-invalid @enderror" id="address_line1"
                                placeholder="Nama Jalan, Gedung, Komplek Dll" rows="2">{{ old('address_line1') }}</textarea>
                            @error('address_line1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Alamat Lanjutan</label>
                            <textarea name="address_line2" class="form-control @error('address_line2') is-invalid @enderror" id="address_line2"
                                placeholder="RT, RW No Rumah" rows="2">{{ old('address_line2') }}</textarea>
                            @error('address_line2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">

                            @hasrole('customer')
                                <div class="col-md">
                                    <label for="primary_address" class="form-label">Alamat Utama</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="primary_address" id="primary_address">
                                        {{-- <label class="form-check-label" for="primary_address">Switch Default</label> --}}
                                    </div>
                                </div>
                            @endrole

                            @hasrole('seller')
                                <div class="col-md">
                                    <label for="store_address" class="form-label">Alamat Toko</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="store_address"
                                            id="store_address">
                                        {{-- <label class="form-check-label" for="primary_address">Switch Default</label> --}}
                                    </div>
                                </div>
                            @endrole

                            {{-- <div class="col-md">
                                <label for="return_address" class="form-label">Alamat Pengembalian</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="return_address"
                                        id="return_address">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>

    <form method="POST" id="form-update-address">
        <div id="editAddressModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="editAddressModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAddressModalLabel">Ubah Alamat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Penerima</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Nama Penerima">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">No. HP</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="Nomor Telepon">
                        </div>

                        <div class="mb-3">
                            <label for="province_id_update">Provinsi</label>
                            <select name="province_id" class="form-control" id="province_id_update">
                                <option></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="city_id_update">Kota</label>
                            <select name="city_id" class="form-control" id="city_id_update">
                                <option></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="subdistrict_id_update">Kecamatan</label>
                            <select name="subdistrict_id" class="form-control" id="subdistrict_id_update">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address_line1" class="form-label">Alamat Utama</label>
                            <textarea name="address_line1" class="form-control" id="address_line1" placeholder="Nama Jalan, Gedung, Komplek Dll"
                                rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Alamat Lanjutan</label>
                            <textarea name="address_line2" class="form-control" id="address_line2" placeholder="RT, RW No Rumah"
                                rows="2"></textarea>
                            @error('address_line2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 row">

                            @hasrole('customer')
                                <div class="col-md">
                                    <label for="primary_address_update" class="form-label">Alamat Utama</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="primary_address" id="primary_address_update">
                                        {{-- <label class="form-check-label" for="primary_address">Switch Default</label> --}}
                                    </div>
                                </div>
                            @endrole

                            @hasrole('seller')
                                <div class="col-md">
                                    <label for="store_address_update" class="form-label">Alamat Toko</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="store_address"
                                            id="store_address_update">
                                        {{-- <label class="form-check-label" for="primary_address">Switch Default</label> --}}
                                    </div>
                                </div>
                            @endrole

                            {{-- <div class="col-md">
                                <label for="return_address_update" class="form-label">Alamat Pengembalian</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="return_address"
                                        id="return_address_update">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>

    <!-- removeItemModal -->
    <form method="POST" id="form-delete-address">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method('DELETE')
        <input type="hidden" name="id">
        <div id="removeAddressModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this address ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger ">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>
@endsection

@section('plugin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        $(document).ready(function() {
            $("#list-banks").select2({
                placeholder: 'Pilih Bank'
            });

            $('#list-banks').change(function() {
                var name = $(this).find(':selected').data('name');
                $('[name="bank_name"]').val(name);
            })

            $('#img-user').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('.preview-img-user').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                    setTimeout(() => {
                        $('#form-image').submit();
                    }, 300);
                }
            });

            $('#img-store').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('.preview-img-store').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                    setTimeout(() => {
                        $('#form-logo').submit();
                    }, 300);
                }
            });

            $('#form-add-address').submit(function() {
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.address.create') }}",
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        // location.reload();
                        notification('error', error.responseJSON.message);
                    }
                });

                return false;
            })

            $('#form-update-address').submit(function() {
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        // console.log(error);
                        notification('error', error.responseJSON.message);
                        // location.reload();
                    }
                });

                return false;
            })

            $('#form-delete-address').submit(function() {
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        // location.reload();
                        notification('error', error.responseJSON.message);
                    }
                });

                return false;
            })


            $('.btn-edit').on('click', function() {
                var id = $(this).attr('data-id');
                $('#form-update-address').attr('action', "{{ url('address/update') }}/" + id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('address/show') }}/" + id,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        $('#form-update-address [name="id"]').val(response.id);
                        $('#form-update-address [name="name"]').val(response.name);
                        $('#form-update-address [name="phone"]').val(response.phone);
                        $('#form-update-address [name="address_line1"]').html(response
                            .address_line1);
                        $('#form-update-address [name="address_line2"]').html(response
                            .address_line2);

                        if (response.primary_address === "on") {
                            $('#form-update-address [name="primary_address"]').prop(
                                'checked',
                                true);
                        }

                        if (response.store_address === "on") {
                            $('#form-update-address [name="store_address"]').prop(
                                'checked',
                                true);
                        }

                        if (response.return_address === "on") {
                            $('#form-update-address [name="return_address"]').prop(
                                'checked',
                                true);
                        }

                        $('#province_id_update').append('<option value="' + response
                            .subdistrict
                            .city.province.id + '" selected="selected">' + response
                            .subdistrict
                            .city.province.province_name + '</option>');

                        $('#city_id_update').append('<option value="' + response
                            .subdistrict
                            .city.id + '" selected="selected">' + response
                            .subdistrict
                            .city.city_name + '</option>');

                        $('#subdistrict_id_update').append('<option value="' + response
                            .subdistrict.id + '" selected="selected">' + response
                            .subdistrict.subdistrict_name +
                            '</option>');

                        $('#editAddressModal').modal('show');

                        // Select 2 Update
                        $("#province_id_update").select2({
                            dropdownParent: "#editAddressModal",
                            placeholder: 'Pilih Provinsi',
                            ajax: {
                                url: "{{ route('province') }}",
                                type: "post",
                                dataType: 'json',
                                delay: 250,
                                data: function(params) {
                                    return {
                                        _token: CSRF_TOKEN,
                                        search: params.term,
                                        // province_id: province_id
                                    };
                                },
                                processResults: function(response) {
                                    return {
                                        results: response
                                    };
                                },
                                cache: true
                            }
                        });

                        $('#province_id_update').on('change', function() {
                            $('#city_id_update').focus();
                            var province_id = $(this).val();
                            $("#city_id_update").select2({
                                dropdownParent: "#editAddressModal",
                                placeholder: 'Pilih Kota',
                                ajax: {
                                    url: "{{ route('city') }}",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            _token: CSRF_TOKEN,
                                            search: params.term,
                                            province_id: province_id
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }
                            });
                        });

                        $('#city_id_update').on('change', function() {
                            $('#subdistrict_update').focus();

                            var city_id = $(this).val();
                            $("#subdistrict_id_update").select2({
                                dropdownParent: "#editAddressModal",
                                placeholder: 'Pilih Kecamatan',
                                ajax: {
                                    url: "{{ route('subdistrict') }}",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            _token: CSRF_TOKEN,
                                            search: params.term,
                                            city_id: city_id
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }
                            });
                        })
                        // Select2 Update
                    }
                });

                return false;
            });

            $('.btn-remove').on('click', function() {
                var id = $(this).attr('data-id');
                $('#form-delete-address').attr('action', "{{ url('address/delete') }}/" + id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('address/show') }}/" + id,
                    dataType: "JSON",
                    success: function(response) {
                        // console.log(response);
                        $('#form-delete-address [name="id"]').val(response.id);
                        $('#removeAddressModal').modal('show');
                    }
                });

                return false;
            });

            $("#addAddressModal").on('show.bs.modal', function() {
                $("#province_id").select2({
                    dropdownParent: "#addAddressModal",
                    placeholder: 'Pilih Provinsi',
                    ajax: {
                        url: "{{ route('province') }}",
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                _token: CSRF_TOKEN,
                                search: params.term,
                                // province_id: province_id
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    }
                });

                $('#province_id').on('change', function() {
                    $('#city_id').focus();
                    var province_id = $(this).val();
                    $("#city_id").select2({
                        dropdownParent: "#addAddressModal",
                        placeholder: 'Pilih Kota',
                        ajax: {
                            url: "{{ route('city') }}",
                            type: "post",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    _token: CSRF_TOKEN,
                                    search: params.term,
                                    province_id: province_id
                                };
                            },
                            processResults: function(response) {
                                return {
                                    results: response
                                };
                            },
                            cache: true
                        }
                    });
                });

                $('#city_id').on('change', function() {
                    $('#subdistrict').focus();

                    var city_id = $(this).val();
                    $("#subdistrict_id").select2({
                        dropdownParent: "#addAddressModal",
                        placeholder: 'Pilih Kecamatan',
                        ajax: {
                            url: "{{ route('subdistrict') }}",
                            type: "post",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    _token: CSRF_TOKEN,
                                    search: params.term,
                                    city_id: city_id
                                };
                            },
                            processResults: function(response) {
                                return {
                                    results: response
                                };
                            },
                            cache: true
                        }
                    });
                });
            });
        });
    </script>
@endsection
