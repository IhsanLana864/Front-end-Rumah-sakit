@extends('layouts.main')

@section('title', 'Berita & Artikel - RSUD Sindangbarang')
@section('body-class', 'about-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Berita & Artikel</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>Berita & Artikel</h1>
            <p>Mengenal lebih jauh RSUD Sindangbarang sebagai rumah sakit unggulan yang mendukung terwujudnya masyarakat
                Cianjur sehat dan mandiri.</p>
        </div>
    </div>
    <section class="blog section-space">
        <div class="container">
            {{-- Menggunakan class g-4 untuk gutter (jarak) yang lebih modern --}}
            <div class="row g-4">
                <div class="col-xl-4 col-md-6">
                    {{-- Menambahkan class h-100 dan d-flex untuk menyamakan tinggi kartu --}}
                    <div class="blog__item h-100 d-flex flex-column">
                        {{-- Menambahkan class rounded-3 untuk membuat sudut gambar melengkung --}}
                        <a href="{{ url('#') }}"
                            class="blog__item-media d-block position-relative overflow-hidden rounded-3">
                            <div class="panel wow"></div>
                            <img class="img-fluid" src="{{ asset('assets/img/gallery/blog-item-1.jpg') }}"
                                alt="Kegiatan Bakti Sosial RSUD Sindangbarang">
                            <span class="blog__item-category">Berita</span>
                        </a>
                        {{-- Menambahkan class d-flex untuk mengatur tata letak konten --}}
                        <div class="blog__item-content d-flex flex-column flex-grow-1">
                            <div class="blog__item-content-date mb-15 mb-xs-10"><i class="fa-solid fa-calendar-days"></i>
                                <span>10 Juli 2024</span></div>
                            <h4 class="mb-15 mb-xs-10"><a href="{{ url('/detail-berita') }}">RSUD Sindangbarang Gelar Bakti Sosial
                                    Pemeriksaan Kesehatan Gratis</a></h4>
                            <p class="mb-40 mb-xs-30">Dalam rangka meningkatkan kesadaran kesehatan, kami mengadakan bakti
                                sosial untuk masyarakat sekitar...</p>
                            {{-- Menambahkan class mt-auto agar tombol selalu di bawah --}}
                            <a class="rr-a-btn mt-auto" href="{{ url('/detail-berita') }}">Baca Selengkapnya <i
                                    class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="blog__item h-100 d-flex flex-column">
                        <a href="{{ url('/artikel/detail-berita') }}"
                            class="blog__item-media d-block position-relative overflow-hidden rounded-3">
                            <div class="panel wow"></div>
                            <img class="img-fluid" src="{{ asset('assets/img/gallery/blog-item-1.jpg') }}"
                                alt="Artikel edukasi kesehatan jantung">
                            <span class="blog__item-category">Edukasi</span>
                        </a>
                        <div class="blog__item-content d-flex flex-column flex-grow-1">
                            <div class="blog__item-content-date mb-15 mb-xs-10"><i class="fa-solid fa-calendar-days"></i>
                                <span>8 Juli 2024</span></div>
                            <h4 class="mb-15 mb-xs-10"><a href="{{ url('/artikel/detail-berita') }}">5 Tips Mudah Menjaga
                                    Kesehatan Jantung Anda Sehari-hari</a></h4>
                            <p class="mb-40 mb-xs-30">Kesehatan jantung adalah kunci hidup berkualitas. Simak beberapa tips
                                mudah yang bisa Anda terapkan...</p>
                            <a class="rr-a-btn mt-auto" href="{{ url('/artikel/detail-berita') }}">Baca Selengkapnya <i
                                    class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-6">
                    <div class="blog__item h-100 d-flex flex-column">
                        <a href="{{ url('/artikel/detail-berita') }}"
                            class="blog__item-media d-block position-relative overflow-hidden rounded-3">
                            <div class="panel wow"></div>
                            <img class="img-fluid" src="{{ asset('assets/img/gallery/blog-item-1.jpg') }}"
                                alt="Tips Kesehatan Jantung">
                            <span class="blog__item-category article-category">Artikel</span>
                        </a>
                        <div class="blog__item-content d-flex flex-column flex-grow-1">
                            <div class="blog__item-content-date mb-15 mb-xs-10">
                                <i class="fa-solid fa-calendar-days"></i> <span>1 Juli 2024</span>
                            </div>
                            <h4 class="mb-15 mb-xs-10">
                                <a href="{{ url('/artikel/detail-berita') }}">Tips Menjaga Kesehatan Jantung Sejak
                                    Dini</a>
                            </h4>
                            <p class="mb-40 mb-xs-30">Kesehatan jantung sangat penting untuk kehidupan yang berkualitas.
                                Simak berbagai tips menjaga jantung agar tetap sehat dan kuat.</p>
                            <a class="rr-a-btn mt-auto" href="{{ url('/artikel/detail-berita') }}">Baca Selengkapnya <i
                                    class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
