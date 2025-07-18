@extends('admin.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Berita</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Home</a></li>
                <li class="breadcrumb-item">Berita</li>
                <li class="breadcrumb-item">Detail</li> {{-- Tambahkan breadcrumb Detail --}}
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
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h4 class="card-title">Detail Berita: {{ $berita->judul ?? 'Tidak ada judul' }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul ?? 'Gambar Berita' }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                @else
                                    <p>Tidak ada gambar</p>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h3 class="mb-3">{{ $berita->judul ?? 'Judul Tidak Tersedia' }}</h3>
                                {{-- Asumsikan 'detail' adalah kolom yang berisi isi/konten berita --}}
                                <p><strong>Isi Berita:</strong></p>
                                <div class="card-text">
                                    {!! $berita->detail ?? 'Tidak ada isi berita.' !!} {{-- Gunakan {!! !!} jika konten detail adalah HTML --}}
                                </div>
                                <hr>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning">
                                        <i class="feather-edit me-2"></i>Edit
                                    </a>
                                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                                        <i class="feather-arrow-left me-2"></i>Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection