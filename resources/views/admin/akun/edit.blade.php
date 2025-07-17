@extends('admin.layouts.main')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Admin</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.akun.index') }}">Home</a></li>
                <li class="breadcrumb-item">Edit</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                {{-- Value diisi dengan data admin yang ada, fallback ke old() --}}
                                <input type="text" class="form-control mb-2" name="name" required autofocus value="{{ old('name', $admin->name) }}" placeholder="Nama admin">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                {{-- Value diisi dengan data admin yang ada, fallback ke old() --}}
                                <input type="email" class="form-control mb-2" name="email" required value="{{ old('email', $admin->email) }}" placeholder="Email admin">
                            </div>

                            <div class="col-12 mb-4">
                                <label for="password" class="form-label">Password</label> {{-- Hapus tanda * karena opsional --}}
                                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password"> {{-- Hapus 'required' --}}
                                <small class="form-text text-muted mt-2">
                                    Biarkan kosong jika tidak ingin mengubah password.
                                </small>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted mt-2">
                                    Password harus memiliki:
                                    <ul>
                                        <li>Minimal 8 karakter</li>
                                        <li>Setidaknya satu huruf besar dan satu huruf kecil</li>
                                        <li>Setidaknya satu angka</li>
                                        <li>Setidaknya satu simbol (contoh: !@#$%^&*)</li>
                                    </ul>
                                </small>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label> {{-- Hapus tanda * --}}
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password"> {{-- Hapus 'required' --}}
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button class="btn btn-primary" type="submit">
                                <i class="feather-save me-2"></i>
                                <span>Update</span> {{-- Diubah dari Save menjadi Update --}}
                            </button>
                            <a href="{{ route('admin.akun.index') }}" class="btn btn-secondary">
                                <i class="feather-x-circle me-2"></i>
                                <span>Cancel</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection