@extends('admin.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Dashboard</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                        <span class="reportrange-picker-field"></span>
                    </div>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <!-- [Mini Card] start -->
            <div class="col-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="hstack justify-content-between mb-4 pb-">
                            <div>
                                <h5 class="mb-1">Master Reports</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-2 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope fs-3 text-primary"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">50,545</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Total Dokter</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope-plus fs-3 text-warning"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">25,000</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Total Manajerial</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope-check fs-3 text-success"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">20,354</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Delivered</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope-open fs-3 text-indigo"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">12,422</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Opened</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope-heart fs-3 text-teal"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">6,248</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Clicked</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-lg-4 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-envelope-slash fs-3 text-danger"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">2,047</div>
                                        <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Bounce</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Mini Card] end -->
            <!-- [Visitors Overview] start -->
            <div class="col-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">E-Survey Overview</h5>
                    </div>
                    <hr class="my-0"> 
                    <div class="card-body"> 
                        <div class="row row justify-content-around">
                            <div class="col-md-3"> <h5>Jenis Kelamin Responden</h5>
                                <canvas id="jenisKelaminChart"></canvas>
                            </div>
                            <div class="col-md-3">
                                <h5>Pendidikan Responden</h5>
                                <canvas id="pendidikanChart"></canvas>
                            </div>
                            <div class="col-md-3">
                                <h5>Pekerjaan Responden</h5>
                                <canvas id="pekerjaanChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Visitors Overview] end -->            
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataJenisKelamin = {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah Responden',
                    data: [{{ $jumlahLakiLaki ?? 0 }}, {{ $jumlahPerempuan ?? 0 }}], // Data dari controller
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)', // Biru
                        'rgba(255, 99, 132, 0.8)' // Merah
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            const dataPendidikan = {
                labels: ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'],
                datasets: [{
                    label: 'Jumlah Responden',
                    data: [
                        {{ $jumlahSD ?? 0 }},
                        {{ $jumlahSMP ?? 0 }},
                        {{ $jumlahSMA ?? 0 }},
                        {{ $jumlahS1 ?? 0 }},
                        {{ $jumlahS2 ?? 0 }},
                        {{ $jumlahS3 ?? 0 }}
                    ], // Data dari controller
                    backgroundColor: [
                        'rgba(255, 205, 86, 0.8)', // Kuning
                        'rgba(75, 192, 192, 0.8)', // Hijau Teal
                        'rgba(153, 102, 255, 0.8)', // Ungu
                        'rgba(255, 159, 64, 0.8)', // Oranye
                        'rgba(199, 199, 199, 0.8)', // Abu-abu
                        'rgba(83, 109, 254, 0.8)' // Biru Muda
                    ],
                    borderColor: [
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(199, 199, 199, 1)',
                        'rgba(83, 109, 254, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            const dataPekerjaan = {
                labels: ['PNS', 'TNI', 'POLRI', 'SWASTA', 'WIRAUSAHA', 'LAINNYA'],
                datasets: [{
                    label: 'Jumlah Responden',
                    data: [
                        {{ $jumlahPNS ?? 0 }},
                        {{ $jumlahTNI ?? 0 }},
                        {{ $jumlahPOLRI ?? 0 }},
                        {{ $jumlahSwasta ?? 0 }},
                        {{ $jumlahWirausaha ?? 0 }},
                        {{ $jumlahLainnyaPekerjaan ?? 0 }}
                    ], // Data dari controller
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)', // Merah
                        'rgba(54, 162, 235, 0.8)', // Biru
                        'rgba(255, 205, 86, 0.8)', // Kuning
                        'rgba(75, 192, 192, 0.8)', // Hijau Teal
                        'rgba(153, 102, 255, 0.8)', // Ungu
                        'rgba(201, 203, 207, 0.8)' // Abu-abu kebiruan
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(201, 203, 207, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            // Konfigurasi Chart untuk Jenis Kelamin
            new Chart(document.getElementById('jenisKelaminChart'), {
                type: 'pie', // Tipe chart: pie
                data: dataJenisKelamin,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Jenis Kelamin Responden'
                        }
                    }
                },
            });

            // Konfigurasi Chart untuk Pendidikan
            new Chart(document.getElementById('pendidikanChart'), {
                type: 'pie',
                data: dataPendidikan,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Pendidikan Responden'
                        }
                    }
                },
            });

            // Konfigurasi Chart untuk Pekerjaan
            new Chart(document.getElementById('pekerjaanChart'), {
                type: 'pie',
                data: dataPekerjaan,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Pekerjaan Responden'
                        }
                    }
                },
            });
        });
    </script>
@endpush