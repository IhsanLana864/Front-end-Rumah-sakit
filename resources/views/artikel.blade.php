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
                        <a href="{{ url('#') }}" class="blog__item-media d-block position-relative overflow-hidden rounded-3">
                            <div class="panel wow"></div>
                            <img class="img-fluid" src="{{ asset('assets/img/gallery/blog-item-1.jpg') }}" alt="Kegiatan Bakti Sosial RSUD Sindangbarang">
                            <span class="blog__item-category">Berita</span>
                        </a>
                        {{-- Menambahkan class d-flex untuk mengatur tata letak konten --}}
                        <div class="blog__item-content d-flex flex-column flex-grow-1">
                            <div class="blog__item-content-date mb-15 mb-xs-10"><i class="fa-solid fa-calendar-days"></i> <span>10 Juli 2024</span></div>
                            <h4 class="mb-15 mb-xs-10"><a href="{{ url('#') }}">RSUD Sindangbarang Gelar Bakti Sosial Pemeriksaan Kesehatan Gratis</a></h4>
                            <p class="mb-40 mb-xs-30">Dalam rangka meningkatkan kesadaran kesehatan, kami mengadakan bakti sosial untuk masyarakat sekitar...</p>
                            {{-- Menambahkan class mt-auto agar tombol selalu di bawah --}}
                            <a class="rr-a-btn mt-auto" href="{{ url('#') }}">Baca Selengkapnya <i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="blog__item h-100 d-flex flex-column">
                        <a href="{{ url('/artikel/detail-edukasi') }}" class="blog__item-media d-block position-relative overflow-hidden rounded-3">
                            <div class="panel wow"></div>
                            <img class="img-fluid" src="{{ asset('assets/img/gallery/blog-item-1.jpg') }}" alt="Artikel edukasi kesehatan jantung">
                            <span class="blog__item-category">Edukasi</span>
                        </a>
                        <div class="blog__item-content d-flex flex-column flex-grow-1">
                            <div class="blog__item-content-date mb-15 mb-xs-10"><i class="fa-solid fa-calendar-days"></i> <span>8 Juli 2024</span></div>
                            <h4 class="mb-15 mb-xs-10"><a href="{{ url('/artikel/detail-edukasi') }}">5 Tips Mudah Menjaga Kesehatan Jantung Anda Sehari-hari</a></h4>
                            <p class="mb-40 mb-xs-30">Kesehatan jantung adalah kunci hidup berkualitas. Simak beberapa tips mudah yang bisa Anda terapkan...</p>
                            <a class="rr-a-btn mt-auto" href="{{ url('/artikel/detail-edukasi') }}">Baca Selengkapnya <i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="blog__item h-100 d-flex flex-column">
                        <a href="http://googleusercontent.com/youtube.com/5" class="blog__item-media d-block position-relative overflow-hidden popup-video rounded-3">
                            <div class="panel wow"></div>
                            <img class="img-fluid" src="{{ asset('assets/img/gallery/blog-item-1.jpg') }}" alt="Video profil RSUD Sindangbarang">
                            <span class="blog__item-category video-category">Video</span>
                            <i class="fa-solid fa-play video-play-icon"></i>
                        </a>
                        <div class="blog__item-content d-flex flex-column flex-grow-1">
                            <div class="blog__item-content-date mb-15 mb-xs-10"><i class="fa-solid fa-calendar-days"></i> <span>5 Juli 2024</span></div>
                            <h4 class="mb-15 mb-xs-10"><a href="http://googleusercontent.com/youtube.com/6" class="popup-video">Video Profil: Mengenal Lebih Dekat Layanan RSUD Sindangbarang</a></h4>
                            <p class="mb-40 mb-xs-30">Tonton video profil kami untuk melihat langsung berbagai fasilitas dan layanan unggulan yang kami sediakan...</p>
                            <a class="rr-a-btn mt-auto popup-video" href="http://googleusercontent.com/youtube.com/7">Tonton Video <i class="fa-solid fa-circle-play"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="blog__item h-100 d-flex flex-column">
                        <a href="{{ url('/artikel/detail-promosi') }}" class="blog__item-media d-block position-relative overflow-hidden rounded-3">
                            <div class="panel wow"></div>
                            <img class="img-fluid" src="{{ asset('assets/img/gallery/blog-item-1.jpg') }}" alt="Promosi Medical Check Up">
                            <span class="blog__item-category promotion-category">Promosi</span>
                        </a>
                        <div class="blog__item-content d-flex flex-column flex-grow-1">
                            <div class="blog__item-content-date mb-15 mb-xs-10"><i class="fa-solid fa-calendar-days"></i> <span>1 Juli 2024</span></div>
                            <h4 class="mb-15 mb-xs-10"><a href="{{ url('/artikel/detail-promosi') }}">Promo Spesial: Paket Medical Check-Up Lengkap Harga Terjangkau</a></h4>
                            <p class="mb-40 mb-xs-30">Manfaatkan promo terbatas kami untuk paket pemeriksaan kesehatan lengkap. Deteksi dini, hidup lebih sehat...</p>
                            <a class="rr-a-btn mt-auto" href="{{ url('/artikel/detail-promosi') }}">Lihat Detail Promo <i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                </div>

                </div>
        </div>
    </section>
@endsection
