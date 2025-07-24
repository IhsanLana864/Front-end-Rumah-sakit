@extends('admin.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Company Profile</h5> {{-- Ubah judul --}}
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.company.index') }}">Home</a></li>
                <li class="breadcrumb-item">Profile</li>
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
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    @if ($companies->isEmpty())
                        <a href="{{ route('admin.company.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>New Data</span>
                        </a>
                    @else
                        @php
                            $company = $companies->first(); // Ambil objek company pertama
                        @endphp
                        <a href="{{ route('admin.company.edit', $company->id) }}" class="btn btn-warning">
                            <i class="feather-edit-3 me-2"></i>
                            <span>Edit Profile</span>
                        </a>
                    @endif
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body"> {{-- Hapus p-0 jika ingin padding --}}
                        @forelse ($companies as $company)
                            <div class="row mb-4">
                                <div class="col-md-3 text-center">
                                    <h6 class="text-muted mb-2">Logo Perusahaan</h6>
                                    @if ($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo Perusahaan" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; border: 2px solid #eee;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded-circle" style="width: 150px; height: 150px; border: 2px dashed #ccc;">
                                            <i class="bi bi-image text-muted fs-3"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <h4 class="mb-3">{{ $company->nama }}</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <strong>Alamat:</strong>
                                            <p>{{ $company->alamat }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Kontak:</strong>
                                            <p>{{ $company->kontak ? implode('-', str_split($company->kontak, 4)) : '-' }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Email:</strong>
                                            <p>{{ $company->email }}</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Koordinat (Long, Lat):</strong>
                                            <p>{{ $company->long }}, {{ $company->lat }}</p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <strong>Falsafah:</strong>
                                            <p>{{ $company->falsafah }}</p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <strong>Visi:</strong>
                                            <p>{{ $company->visi }}</p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <strong>Misi:</strong>
                                            <p>{{ $company->misi }}</p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <strong>Motto:</strong>
                                            <p>{{ $company->motto }}</p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <strong>Budaya Kerja:</strong>
                                            <p>{{ $company->budaya_kerja }}</p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <strong>Eksternal:</strong>
                                            <p>{{ $company->eksternal }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <p>Tidak ada data profil perusahaan. Silakan tambahkan data baru.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection