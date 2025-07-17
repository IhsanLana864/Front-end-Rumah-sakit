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

                @php
                    $doctors = [
                        [
                            'img' => 'staff-3.webp',
                            'name' => 'dr.M.Lucky N Prameswara,Sp.PD',
                            'spec' => 'Dokter Spesialis Penyakit Dalam',
                        ],
                        [
                            'img' => 'staff-7.webp',
                            'name' => 'dr.Teguh Karyadi, Sp.B',
                            'spec' => 'Dokter Spesialis Bedah',
                        ],
                        [
                            'img' => 'staff-11.webp',
                            'name' => 'dr.Tendi Robby Setia, Sp.OG.',
                            'spec' => 'Dokter Spesialis Obstetri dan Ginekologi',
                        ],
                        [
                            'img' => 'staff-14.webp',
                            'name' => 'dr. Azka Putra Rakhmatullah, Sp.An',
                            'spec' => 'Dokter Spesialis Anestesi',
                        ],
                        ['img' => 'staff-5.webp', 'name' => 'drg. Ridho Akhri Prianto', 'spec' => 'Dokter Gigi'],
                        ['img' => 'staff-9.webp', 'name' => 'dr.Fasya Sophia Septiavina', 'spec' => 'Dokter Umum'],
                        ['img' => 'staff-2.webp', 'name' => 'dr. Angela Virgini Tiomegarani', 'spec' => 'Dokter Umum'],
                        ['img' => 'staff-12.webp', 'name' => 'dr.Hasnawati', 'spec' => 'Dokter Umum'],
                        ['img' => 'staff-1.webp', 'name' => 'dr.Fajar Utama', 'spec' => 'Dokter Umum'],
                    ];
                    $delay = 100;
                @endphp

                @foreach ($doctors as $doctor)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="{{ asset('assets/img/health/' . $doctor['img']) }}" alt="Dokter"
                                    class="img-fluid">
                                <div class="doctor-overlay"></div>
                            </div>
                            <div class="doctor-content">
                                <h4 class="doctor-name">{{ $doctor['name'] }}</h4>
                                <span class="doctor-specialty">{{ $doctor['spec'] }}</span>
                                <a href="{{ url('appointment.html') }}" class="btn-appointment">Buat Janji</a>
                            </div>
                        </div>
                    </div>
                    @php
                        $delay += 100;
                        if ($delay > 400) {
                            $delay = 100;
                        }
                    @endphp
                @endforeach

            </div>
        </div>
    </section>

@endsection
