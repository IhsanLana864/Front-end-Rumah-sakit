@extends('layouts.main')

@section('title', 'Detail Berita - RSUD Sindangbarang')
@section('body-class', 'berita-detail-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    {{-- PERBAIKAN: Link ini harusnya ke halaman daftar artikel, TIDAK ke detail-berita tanpa ID --}}
                    <li class="breadcrumb-item"><a href="{{ route('artikel') }}">Berita & Artikel</a></li>
                    <li class="breadcrumb-item active current">Detail Berita</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>{{ $berita->judul}}</h1>
            <p>Dipublikasikan pada <strong>{{ $berita->created_at->translatedFormat('d F Y') }}</strong> oleh Humas RSUD Sindangbarang</p>
        </div>
    </div>

    <section id="berita-detail" class="section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="content" style="white-space: pre-wrap;">
                        {{-- Tampilkan gambar berita jika ada --}}
                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul ?? 'Berita RSUD' }}"
                                class="img-fluid rounded mb-4">
                        @else
                            {{-- Placeholder jika tidak ada gambar --}}
                            <img src="{{ asset('path/to/placeholder_image.jpg') }}" alt="Gambar Tidak Tersedia"
                                class="img-fluid rounded mb-4">
                            <p class="text-muted text-center">Gambar tidak tersedia</p>
                        @endif

                        {{-- Tampilkan detail berita dari database --}}
                        {{ $berita->detail }}

                        {{-- Pastikan menggunakan asset() helper untuk gambar statis --}}
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/img/health/facilities-2.webp') }}" alt="Fasilitas Baru"
                                    class="img-fluid rounded">
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('assets/img/health/staff-5.webp') }}" alt="Tenaga Medis"
                                    class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar" data-aos="fade-left" data-aos-delay="200">
                        <h5>Berita Lainnya</h5>
                        <ul class="list-unstyled">
                            {{-- PERBAIKAN: Loop untuk menampilkan berita lainnya secara dinamis --}}
                            @forelse($otherBeritas as $otherBerita)
                                <li><a href="{{ route('detail-berita', $otherBerita->id) }}">{{ $otherBerita->judul }}</a></li>
                            @empty
                                <li>Tidak ada berita lainnya.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection