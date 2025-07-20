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
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">E-Survey Overview</h5>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row row justify-content-around">
                            <div class="col-md-3">
                                <h5>Jenis Kelamin Responden</h5>
                                <div id="jenisKelaminChart"></div> </div>
                            <div class="col-md-3">
                                <h5>Pendidikan Responden</h5>
                                <div id="pendidikanChart"></div> </div>
                            <div class="col-md-3">
                                <h5>Pekerjaan Responden</h5>
                                <div id="pekerjaanChart"></div> </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ... (Kode JavaScript yang sudah ada untuk input "Lainnya...") ...

            // --- Data dari Controller Laravel (Contoh Dummy) ---
            // Pastikan variabel ini diteruskan dari controller Anda
            const jumlahLakiLaki = {{ $jumlahLakiLaki ?? 0 }};
            const jumlahPerempuan = {{ $jumlahPerempuan ?? 0 }};

            const jumlahSD = {{ $jumlahSD ?? 0 }};
            const jumlahSMP = {{ $jumlahSMP ?? 0 }};
            const jumlahSMA = {{ $jumlahSMA ?? 0 }};
            const jumlahS1 = {{ $jumlahS1 ?? 0 }};
            const jumlahS2 = {{ $jumlahS2 ?? 0 }};
            const jumlahS3 = {{ $jumlahS3 ?? 0 }};

            const jumlahPNS = {{ $jumlahPNS ?? 0 }};
            const jumlahTNI = {{ $jumlahTNI ?? 0 }};
            const jumlahPOLRI = {{ $jumlahPOLRI ?? 0 }};
            const jumlahSwasta = {{ $jumlahSwasta ?? 0 }};
            const jumlahWirausaha = {{ $jumlahWirausaha ?? 0 }};
            const jumlahLainnyaPekerjaan = {{ $jumlahLainnyaPekerjaan ?? 0 }};

            // --- Konfigurasi dan Inisialisasi ApexCharts ---

            // Chart Jenis Kelamin
            const optionsJenisKelamin = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: ['Laki-laki', 'Perempuan'],
                series: [jumlahLakiLaki, jumlahPerempuan],
                colors: ['#36A2EB', '#FF6384'], // Warna yang lebih kuat dari rgba
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            // Pastikan elemen ditemukan sebelum inisialisasi
            const jenisKelaminChartEl = document.querySelector("#jenisKelaminChart");
            if (jenisKelaminChartEl) {
                const jenisKelaminChart = new ApexCharts(jenisKelaminChartEl, optionsJenisKelamin);
                jenisKelaminChart.render();
            } else {
                console.error("Elemen #jenisKelaminChart tidak ditemukan!");
            }


            // Chart Pendidikan
            const optionsPendidikan = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'],
                series: [jumlahSD, jumlahSMP, jumlahSMA, jumlahS1, jumlahS2, jumlahS3],
                colors: ['#FFCD56', '#4BC0C0', '#9966FF', '#FF9F40', '#C7C7C7', '#536DFE'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            const pendidikanChartEl = document.querySelector("#pendidikanChart");
            if (pendidikanChartEl) {
                const pendidikanChart = new ApexCharts(pendidikanChartEl, optionsPendidikan);
                pendidikanChart.render();
            } else {
                console.error("Elemen #pendidikanChart tidak ditemukan!");
            }


            // Chart Pekerjaan
            const optionsPekerjaan = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: ['PNS', 'TNI', 'POLRI', 'SWASTA', 'WIRAUSAHA', 'LAINNYA'],
                series: [jumlahPNS, jumlahTNI, jumlahPOLRI, jumlahSwasta, jumlahWirausaha, jumlahLainnyaPekerjaan],
                colors: ['#FF6384', '#36A2EB', '#FFCD56', '#4BC0C0', '#9966FF', '#C9CBCE'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            const pekerjaanChartEl = document.querySelector("#pekerjaanChart");
            if (pekerjaanChartEl) {
                const pekerjaanChart = new ApexCharts(pekerjaanChartEl, optionsPekerjaan);
                pekerjaanChart.render();
            } else {
                console.error("Elemen #pekerjaanChart tidak ditemukan!");
            }
        });
    </script>
@endpush