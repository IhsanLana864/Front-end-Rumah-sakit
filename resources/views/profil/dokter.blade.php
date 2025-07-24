@extends('layouts.main')

@section('title', 'Tim Dokter - RSUD Sindangbarang')
@section('body-class', 'doctors-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Tim Kami</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>Tim Dokter</h1>
            <p>Perkenalkan tim profesional berdedikasi kami yang siap memberikan pelayanan kesehatan terbaik untuk Anda dan
                keluarga.</p>
        </div>
    </div>

    <section id="doctors" class="doctors section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <h2 style="font-weight: 700; margin-bottom: 20px; color: #005d8f;">Tim Dokter</h2>

            <div class="row gy-4">
                @forelse ($dokters as $dokter)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="{{ asset('storage/' . $dokter->foto) }}" alt="Dokter"
                                    class="img-fluid">
                                <div class="doctor-overlay"></div>
                            </div>
                            <div class="doctor-content">
                                <h4 class="doctor-name">{{ $dokter->nama }}</h4>
                                <span class="doctor-specialty">{{ $dokter->spesifikasi }}</span>
                                <div class="appointment-actions">
                                    <!-- <a href="" class="btn btn-outline-primary btn-sm">Lihat Profil</a> -->
                                    <a href="https://api.whatsapp.com/send/?phone=6282130677599&text&type=phone_number&app_absent=0"
                                        class="btn-appointment">Buat Janji</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <span>Belum ada dokter.</span>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
