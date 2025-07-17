@extends('layouts.main')

@section('title', 'Manajemen - RSUD Sindangbarang')
@section('body-class', 'doctors-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Tim Manajerial</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>Tim Manajerial</h1>
            <p>Perkenalkan tim manajerial yang berdedikasi untuk memastikan operasional dan pelayanan di RSUD Sindangbarang
                berjalan optimal.</p>
        </div>
    </div>

    <section id="doctors" class="doctors section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <h2 style="font-weight: 700; margin-bottom: 20px; color: #005d8f;">Struktur Manajemen</h2>
            <div class="row gy-4">
                @php
                    $manajerials = [
                        [
                            'nama' => 'dr. Linda Lindiawati, M.H',
                            'jabatan' => 'Plt. Direktur',
                        ],
                        [
                            'nama' => 'Imas Rohimah, S.ST.M.Kes',
                            'jabatan' => 'Plt. Kasubag TU dan Kepegawaian',
                        ],
                        [
                            'nama' => 'Hendar Soleh, S.Kep, Ners',
                            'jabatan' => 'Plt. Kasie Pelayanan Medik dan Keperawatan',
                        ],
                        [
                            'nama' => 'Herra Winy Permana, Amd.Kep.',
                            'jabatan' => 'Plt. Kasie Penunjang Medik',
                        ]
                    ];
                @endphp

                @foreach ($manajerials as $index => $manajer)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="{{ asset('assets/img/health/manajemen.png') }}" alt="Manajerial" class="img-fluid">
                                <div class="doctor-overlay"></div>
                            </div>
                            <div class="doctor-content">
                                <h4 class="doctor-name">{{ $manajer['nama'] }}</h4>
                                <span class="doctor-specialty">{{ $manajer['jabatan'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
