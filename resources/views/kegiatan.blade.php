@extends('layouts.main')

@section('title', 'Kegiatan - RSUD Sindangbarang')
@section('body-class', 'gallery-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Kegiatan</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>Kegiatan</h1>
            <p>Dokumentasi berbagai kegiatan yang kami selenggarakan sebagai bagian dari komitmen kami terhadap kesehatan
                masyarakat.</p>
        </div>
    </div>
    <section id="gallery" class="gallery section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- <div class="row">
                <div class="col-lg-12">
                    <ul class="gallery-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-penyuluhan">Penyuluhan</li>
                        <li data-filter=".filter-baksos">Bakti Sosial</li>
                        <li data-filter=".filter-internal">Internal</li>
                    </ul>
                </div>
            </div> -->

            <div class="row g-4 isotope-layout" data-aos="fade-up" data-aos-delay="200">
                @forelse ($kegiatans as $kegiatan)
                    <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-penyuluhan">
                        <div class="gallery-card">
                            <div class="gallery-img">
                                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="img-fluid"
                                    alt="{{ $kegiatan->judul }}" loading="lazy">
                                <div class="gallery-overlay">
                                    <div class="gallery-info">
                                        <h4>{{ $kegiatan->judul }}</h4>
                                        <p>{{ $kegiatan->keterangan }}</p>
                                        <a href="{{ asset('storage/' . $kegiatan->gambar) }}"
                                            class="glightbox gallery-link" data-gallery="gallery-images">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <span>Belum kegiatan yang di post.</span>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
