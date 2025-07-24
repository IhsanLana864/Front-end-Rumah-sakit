@extends('admin.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Tentang Kami</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.tentang-kami.index') }}">Home</a></li>
                <li class="breadcrumb-item">Tentang Kami</li>
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
                    {{-- LOGIKA UNTUK MENAMPILKAN TOMBOL "New Data" ATAU "Edit" / "Delete" --}}
                    @if (!isset($tentang_kami) || is_null($tentang_kami)) {{-- Jika belum ada data --}}
                        <a href="{{ route('admin.tentang-kami.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>New Data</span>
                        </a>
                    @else
                        {{-- Jika ada data, tampilkan tombol Edit dan Delete --}}
                        <a href="{{ route('admin.tentang-kami.edit', $tentang_kami->id) }}" class="btn btn-warning">
                            <i class="feather-edit-3 me-2"></i>
                            <span>Edit Data</span>
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
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        {{-- Tampilan Profil Tentang Kami --}}
                        @if (isset($tentang_kami) && !is_null($tentang_kami))
                            <div class="row mb-4">
                                <div class="col-12 text-center mb-4">
                                    <h4>Gambar Tentang Kami</h4>
                                    <hr>
                                </div>

                                {{-- Tampilan Gambar 1 (Foto Atas) --}}
                                <div class="col-md-4 mb-4">
                                    <strong>Foto Atas (Gambar 1):</strong>
                                    @if ($tentang_kami->gambar1)
                                        <div class="image-preview-wrapper" style="max-width: 100%; height: auto; border: 1px solid #eee; padding: 5px; border-radius: 8px;">
                                            <img src="{{ asset('storage/' . $tentang_kami->gambar1) }}" alt="Foto Atas" class="img-fluid" style="border-radius: 5px;">
                                        </div>
                                    @else
                                        <p class="text-muted">Tidak ada Gambar 1</p>
                                    @endif
                                </div>

                                {{-- Tampilan Gambar 2 (Foto Kiri) --}}
                                <div class="col-md-4 mb-4">
                                    <strong>Foto Kiri (Gambar 2):</strong>
                                    @if ($tentang_kami->gambar2)
                                        <div class="image-preview-wrapper" style="max-width: 100%; height: auto; border: 1px solid #eee; padding: 5px; border-radius: 8px;">
                                            <img src="{{ asset('storage/' . $tentang_kami->gambar2) }}" alt="Foto Kiri" class="img-fluid" style="border-radius: 5px;">
                                        </div>
                                    @else
                                        <p class="text-muted">Tidak ada Gambar 2</p>
                                    @endif
                                </div>

                                {{-- Tampilan Gambar 3 (Foto Kanan) --}}
                                <div class="col-md-4 mb-4">
                                    <strong>Foto Kanan (Gambar 3):</strong>
                                    @if ($tentang_kami->gambar3)
                                        <div class="image-preview-wrapper" style="max-width: 100%; height: auto; border: 1px solid #eee; padding: 5px; border-radius: 8px;">
                                            <img src="{{ asset('storage/' . $tentang_kami->gambar3) }}" alt="Foto Kanan" class="img-fluid" style="border-radius: 5px;">
                                        </div>
                                    @else
                                        <p class="text-muted">Tidak ada Gambar 3</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            {{-- Pesan jika data kosong --}}
                            <div class="text-center py-5">
                                <p>Tidak ada data Tentang Kami. Silakan tambahkan data baru.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection