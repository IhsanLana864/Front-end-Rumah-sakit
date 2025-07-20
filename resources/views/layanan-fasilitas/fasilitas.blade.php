@extends('layouts.main')

@section('title', 'Fasilitas & Galeri - RSUD Sindangbarang')
@section('body-class', 'departments-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Fasilitas & Galeri</li>
                </ol>
            </nav>
        </div>

        <div class="page-title" style="margin-top: 40px;">
            <div class="title-wrapper">
                <h1>Galeri Fasilitas</h1>
                <p>Lihat lebih dekat berbagai fasilitas, kegiatan, dan momen pelayanan di RSUD Sindangbarang.</p>
            </div>
        </div>
        <section id="gallery" class="gallery section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 isotope-layout" data-layout="masonry" data-sort="original-order">
                    @forelse ($facilities as $facilitie)

                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-fasilitas">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('storage/' . $facilitie->gambar) }}" class="img-fluid" alt="Gedung Perawatan" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>{{ $facilitie->judul }}</h4>
                                            @if ($facilitie->keterangan)
                                                <p>{{ $facilitie->keterangan }}</p>
                                            @else
                                                <p>-</p>
                                            @endif
                                            <a href="{{ asset('storage/' . $facilitie->gambar) }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <span>Belum ada fasilitas yang ditampilkan.</span>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>
    </div>
@endsection
