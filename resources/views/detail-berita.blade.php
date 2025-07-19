@extends('layouts.main')

@section('title', 'Detail Berita - RSUD Sindangbarang')
@section('body-class', 'berita-detail-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('detail-berita') }}">Berita</a></li>
                    <li class="breadcrumb-item active current">Detail Berita</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>{{ $berita->judul}}</h1>
            <p>Dipublikasikan pada <strong>{{ $berita->created_at }}</strong> oleh Humas RSUD Sindangbarang</p>
        </div>
    </div>

    <section id="berita-detail" class="section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="content" style="white-space: pre-wrap;">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Berita RSUD"
                            class="img-fluid rounded mb-4">

                        {{ $berita->detail }}

                        <p>
                            RSUD Sindangbarang terus berkomitmen dalam meningkatkan mutu pelayanan kepada masyarakat. Salah
                            satu langkah strategis yang dilakukan adalah pengembangan fasilitas layanan kesehatan serta
                            peningkatan kapasitas tenaga medis dan non-medis.
                        </p>

                        <p>
                            Fasilitas rumah sakit yang saat ini berdiri di atas lahan seluas 49.982 m² telah mampu melayani
                            8 kecamatan di wilayah Cianjur. Dalam waktu dekat, berbagai inovasi pelayanan berbasis digital
                            juga akan diterapkan untuk mempercepat proses administrasi dan memperluas jangkauan informasi
                            kepada pasien.
                        </p>

                        <p>
                            Rumah sakit ini berpegang pada falsafah pelayanan yang humanis dan paripurna, serta menjalin
                            kemitraan yang kuat dengan berbagai instansi untuk memastikan keberlangsungan pelayanan
                            berkualitas.
                        </p>

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
                            <li><a href="#">Penyuluhan Gizi di Kecamatan Sindangbarang</a></li>
                            <li><a href="#">Layanan Rawat Jalan Kini Buka di Hari Sabtu</a></li>
                            <li><a href="#">Kampanye Donor Darah Bersama PMI</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
