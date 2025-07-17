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
        <div class="title-wrapper">
            <h1>Fasilitas</h1>
            <p>RSUD Sindangbarang menyediakan berbagai layanan poliklinik spesialis dan unit pendukung untuk kesehatan Anda.</p>
        </div>
    </div>

    <section id="departments" class="departments section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                <div class="col-lg-4 d-flex flex-column gap-4">
                    <div class="department-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="department-header">
                            <div class="department-icon"><i class="bi bi-heart-pulse"></i></div>
                            <h3>Poliklinik Penyakit Dalam</h3>
                            <p class="department-subtitle">Penanganan Penyakit Organ Dalam</p>
                        </div>
                        <div class="department-image-wrapper">
                            <img src="{{ asset('assets/img/health/cardiology-2.webp') }}" alt="Penyakit Dalam" class="img-fluid" loading="lazy">
                        </div>
                        <div class="department-content">
                            <p>Menyediakan layanan konsultasi, diagnosis, dan penanganan komprehensif untuk berbagai penyakit yang menyerang organ dalam orang dewasa.</p>
                            <ul class="department-highlights">
                                <li><i class="bi bi-check2"></i> Konsultasi Spesialis</li>
                                <li><i class="bi bi-check2"></i> Diagnosis & Terapi</li>
                                <li><i class="bi bi-check2"></i> Manajemen Penyakit Kronis</li>
                            </ul>
                            <a href="department-details.html" class="department-link">Jadwal Praktik</a>
                        </div>
                    </div>

                    <div class="department-card" data-aos="zoom-in" data-aos-delay="350">
                        <div class="department-header">
                            <div class="department-icon"><i class="fas fa-stethoscope"></i></div>
                            <h3>Poliklinik Bedah</h3>
                            <p class="department-subtitle">Tindakan Bedah Umum & Spesifik</p>
                        </div>
                        <div class="department-image-wrapper">
                            <img src="{{ asset('assets/img/health/dermatology-3.webp') }}" alt="Bedah" class="img-fluid" loading="lazy">
                        </div>
                        <div class="department-content">
                            <p>Melayani konsultasi dan tindakan bedah yang ditangani oleh dokter spesialis bedah berpengalaman untuk berbagai kasus medis.</p>
                            <ul class="department-highlights">
                                <li><i class="bi bi-check2"></i> Bedah Minor</li>
                                <li><i class="bi bi-check2"></i> Perawatan Luka</li>
                                <li><i class="bi bi-check2"></i> Konsultasi Pra-operasi</li>
                            </ul>
                            <a href="department-details.html" class="department-link">Jadwal Praktik</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-flex">
                    <div class="featured-department w-100" data-aos="fade-up" data-aos-delay="250">
                        <div class="featured-header">
                            <div class="featured-badge">
                                <i class="bi bi-star-fill"></i>
                                <span>Unggulan</span>
                            </div>
                            <div class="featured-icon"><i class="bi bi-lightning-fill"></i></div>
                            <h2>Instalasi Gawat Darurat</h2>
                            <p class="featured-subtitle">Pelayanan Darurat 24 Jam</p>
                        </div>
                        <div class="featured-image">
                            <img src="{{ asset('assets/img/health/neurology-4.webp') }}" alt="IGD" class="img-fluid" loading="lazy">
                            <div class="featured-overlay">
                                <div class="achievement-list">
                                    <div class="achievement-item">
                                        <i class="bi bi-award"></i>
                                        <span>Tim Medis Cepat Tanggap</span>
                                    </div>
                                    <div class="achievement-item">
                                        <i class="bi bi-clock"></i>
                                        <span>Buka 24 Jam Non-Stop</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="featured-content">
                            <p>Unit gawat darurat kami siap sedia 24 jam untuk menangani kasus darurat medis dan kebidanan dengan cepat dan tepat.</p>
                            <div class="featured-services">
                                <div class="service-tag">Umum</div>
                                <div class="service-tag">Kebidanan</div>
                                <div class="service-tag">Triase</div>
                                <div class="service-tag">Resusitasi</div>
                            </div>
                            <a href="contact.html" class="featured-btn">
                                Hubungi Kami
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-flex flex-column gap-4">
                    <div class="department-card" data-aos="zoom-in" data-aos-delay="300">
                        <div class="department-header">
                            <div class="department-icon"><i class="fas fa-female"></i></div>
                            <h3>Poliklinik Obstetri & Ginekologi</h3>
                            <p class="department-subtitle">Kesehatan Ibu & Reproduksi</p>
                        </div>
                        <div class="department-image-wrapper">
                            <img src="{{ asset('assets/img/health/orthopedics-4.webp') }}" alt="Obgyn" class="img-fluid" loading="lazy">
                        </div>
                        <div class="department-content">
                            <p>Memberikan pelayanan kesehatan komprehensif seputar kehamilan, persalinan, serta masalah kesehatan reproduksi wanita.</p>
                            <ul class="department-highlights">
                                <li><i class="bi bi-check2"></i> Pemeriksaan Kehamilan</li>
                                <li><i class="bi bi-check2"></i> USG Kebidanan</li>
                                <li><i class="bi bi-check2"></i> Konsultasi Ginekologi</li>
                            </ul>
                            <a href="department-details.html" class="department-link">Jadwal Praktik</a>
                        </div>
                    </div>

                    <div class="department-card" data-aos="zoom-in" data-aos-delay="400">
                        <div class="department-header">
                            <div class="department-icon"><i class="fas fa-tooth"></i></div>
                            <h3>Poliklinik Gigi & Mulut</h3>
                            <p class="department-subtitle">Perawatan Kesehatan Gigi</p>
                        </div>
                        <div class="department-image-wrapper">
                            <img src="{{ asset('assets/img/health/pediatrics-2.webp') }}" alt="Gigi" class="img-fluid" loading="lazy">
                        </div>
                        <div class="department-content">
                            <p>Menyediakan layanan perawatan gigi dan mulut, mulai dari pemeriksaan rutin, pembersihan karang, hingga tindakan penambalan dan pencabutan.</p>
                            <ul class="department-highlights">
                                <li><i class="bi bi-check2"></i> Pemeriksaan Rutin</li>
                                <li><i class="bi bi-check2"></i> Scaling & Polishing</li>
                                <li><i class="bi bi-check2"></i> Tambal & Cabut Gigi</li>
                            </ul>
                            <a href="department-details.html" class="department-link">Jadwal Praktik</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="page-title" style="margin-top: 40px;">
        <div class="title-wrapper">
            <h1>Galeri</h1>
            <p>Lihat lebih dekat berbagai fasilitas, kegiatan, dan momen pelayanan di RSUD Sindangbarang.</p>
        </div>
    </div>

    <section id="gallery" class="gallery section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-12">
                    <ul class="gallery-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-fasilitas">Fasilitas</li>
                        <li data-filter=".filter-pelayanan">Pelayanan</li>
                        <li data-filter=".filter-kegiatan">Kegiatan</li>
                    </ul>
                </div>
            </div>

            <div class="row gy-4 isotope-layout" data-layout="masonry" data-sort="original-order">

                <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-fasilitas">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/gallery/gallery-1.webp') }}" class="img-fluid" alt="Gedung Perawatan" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="gallery-info">
                                    <h4>Gedung Perawatan</h4>
                                    <p>Fasilitas gedung perawatan yang nyaman.</p>
                                    <a href="{{ asset('assets/img/gallery/gallery-1.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-pelayanan">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/gallery/gallery-2.webp') }}" class="img-fluid" alt="Ruang IGD" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="gallery-info">
                                    <h4>Ruang IGD</h4>
                                    <p>Tim medis siap di Instalasi Gawat Darurat.</p>
                                    <a href="{{ asset('assets/img/gallery/gallery-2.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-kegiatan">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/gallery/gallery-3.webp') }}" class="img-fluid" alt="Penyuluhan Kesehatan" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="gallery-info">
                                    <h4>Penyuluhan Kesehatan</h4>
                                    <p>Kegiatan edukasi kepada masyarakat.</p>
                                    <a href="{{ asset('assets/img/gallery/gallery-3.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-fasilitas">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/gallery/gallery-4.webp') }}" class="img-fluid" alt="Ruang Tunggu Poliklinik" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="gallery-info">
                                    <h4>Ruang Tunggu Poliklinik</h4>
                                    <p>Area tunggu yang bersih dan rapi.</p>
                                    <a href="{{ asset('assets/img/gallery/gallery-4.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-pelayanan">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/gallery/gallery-5.webp') }}" class="img-fluid" alt="Pemeriksaan di Laboratorium" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="gallery-info">
                                    <h4>Pemeriksaan di Laboratorium</h4>
                                    <p>Fasilitas laboratorium yang modern.</p>
                                    <a href="{{ asset('assets/img/gallery/gallery-5.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-kegiatan">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="{{ asset('assets/img/gallery/gallery-6.webp') }}" class="img-fluid" alt="Bakti Sosial" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="gallery-info">
                                    <h4>Bakti Sosial</h4>
                                    <p>Partisipasi dalam kegiatan sosial masyarakat.</p>
                                    <a href="{{ asset('assets/img/gallery/gallery-6.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
