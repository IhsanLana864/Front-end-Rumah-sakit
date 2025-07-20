@extends('layouts.main')

@section('title', 'Tentang Kami - RSUD Sindangbarang')
@section('body-class', 'about-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Tentang Kami</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>Tentang Kami</h1>
            <p>Mengenal lebih jauh {{ $company->nama }} sebagai rumah sakit unggulan yang mendukung terwujudnya masyarakat
                Cianjur sehat dan mandiri.</p>
        </div>
    </div>
    <section id="about" class="about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="content">
                        <h2>Profil dan Komitmen {{ $company->nama }}</h2>
                        <p>
                            <b>Falsafah:</b> {{ $company->falsafah }}
                        </p>
                        <p>
                            <b>Visi kami</b> {{ $company->visi }}
                        </p>
                        <p>
                            <b>Misi</b> {{ $company->misi }}
                        </p>

                        <div class="stats-container" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">
                                <div class="col-sm-6 col-lg-12 col-xl-6">
                                    <div class="stat-item">
                                        <div class="stat-number">
                                            @php
                                                $longText = $company->eksternal;

                                                if (!empty($longText)) {
                                                    $commaCount = substr_count($longText, ',');
                                                    $totalItems = $commaCount + 1;
                                                } else {
                                                    $totalItems = 0;
                                                    $totalItems = 1;
                                                }
                                            @endphp
                                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalItems }}"
                                                data-purecounter-duration="1" class="purecounter"></span>
                                        </div>
                                        <div class="stat-label">Kecamatan Terlayani</div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12 col-xl-6">
                                    <div class="stat-item">
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="49982"
                                                data-purecounter-duration="2" class="purecounter"></span> m²
                                        </div>
                                        <div class="stat-label">Luas Area Rumah Sakit</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cta-buttons" data-aos="fade-up" data-aos-delay="300">
                            <a href="doctors.html" class="btn-primary">Temui Tim Dokter Kami</a>
                            <a href="services.html" class="btn-secondary">Lihat Layanan Kami</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="image-section" data-aos="fade-left" data-aos-delay="200">
                        <div class="main-image">
                            <img src="{{ asset('assets/img/health/consultation-3.webp') }}" alt="Healthcare consultation"
                                class="img-fluid">
                        </div>
                        <div class="image-grid">
                            <div class="grid-item">
                                <img src="{{ asset('assets/img/health/facilities-2.webp') }}" alt="Medical facility"
                                    class="img-fluid">
                            </div>
                            <div class="grid-item">
                                <img src="{{ asset('assets/img/health/staff-5.webp') }}" alt="Medical staff"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="certifications-section" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>Didukung Oleh & Mitra</h3>
                            <p>Sebagai rumah sakit milik Pemerintah Daerah, kami didukung penuh dan bekerjasama dengan
                                berbagai pihak untuk memberikan layanan terbaik.</p>
                        </div>
                        <div class="certifications-grid">
                            @forelse ($partners as $partner)
                                <div class="certification-item">
                                    <img src="{{ asset('storage/' . $partner->gambar) }}" alt="{{ $partner->nama }}"
                                        class="img-fluid">
                                </div>
                            @empty
                                <div class="text-center">
                                    <span>Belum ada mitra yang terkait.</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
