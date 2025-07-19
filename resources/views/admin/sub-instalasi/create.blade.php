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
                <h5 class="m-b-10">Sub Instalasi</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.sub-instalasi.index') }}">Home</a></li>
                <li class="breadcrumb-item">Create</li>
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
                    <form action="{{ route('admin.sub-instalasi.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Instalasi <span class="text-danger">*</span></label>
                                <select class="form-control mb-2" name="instalasi_id" required>
                                    <option value="">Pilih Instalasi</option>
                                    @foreach($instalasis as $instalasi)
                                        <option value="{{ $instalasi->id }}" {{ old('instalasi_id') == $instalasi->id ? 'selected' : '' }}>
                                            {{ $instalasi->nama_instalasi }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('instalasi_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Sub Instalasi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="nama_sub" value="{{ old('nama_sub') }}" required placeholder="Nama Sub Instalasi">
                                @error('nama_sub')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button class="btn btn-primary" type="submit">
                                <i class="feather-save me-2"></i>
                                <span>Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection