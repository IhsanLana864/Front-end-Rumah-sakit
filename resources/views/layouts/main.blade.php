<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', '{{ $company->nama }}')</title>
    <meta name="description" content="Menjadi Rumah Sakit Unggulan yang Mendukung Terwujudnya Masyarakat Cianjur Sehat dan Mandiri">
    <meta name="keywords" content="RSUD, Sindangbarang, Cianjur, Rumah Sakit, Kesehatan">

    <link href="{{ asset('assets/img/logo-rs.svg') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/survey.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="@yield('body-class', 'index-page')">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('beranda') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->nama }}" class="logo-img">
            <h1 class="sitename">{{ $company->nama }}</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a></li>
                <li class="dropdown">
                    <a href="#"><span>Layanan & fasilitas</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('layanan.layanan') }}">Layanan</a></li>
                        <li><a href="{{ route('layanan.fasilitas') }}">Fasilitas & Gallery</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('kegiatan') }}" class="{{ request()->routeIs('kegiatan') ? 'active' : '' }}">Kegiatan</a></li>
                <li class="dropdown">
                    <a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('profil.tentang-kami') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('profil.manajemen') }}">Manajemen</a></li>
                        <li><a href="{{ route('profil.dokter') }}">Dokter</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel') ? 'active' : '' }}">Berita & Artikel</a></li>
                <li><a href="{{ route('esurvey') }}" class="{{ request()->routeIs('esurvey') ? 'active' : '' }}">e-survey</a></li>
                <li><a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="tel:{{$company->kontak}}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="16" height="16" viewBox="0 0 16 16" style="margin-right: 8px">
                <path d="M3.654 1.328a.678.678 0 0 1 1.015-.063l2.29 2.29c.329.329.445.82.3 1.25l-.547 1.64a.678.678 0 0 0 .167.678l2.457 2.457a.678.678 0 0 0 .678.167l1.64-.547c.43-.145.921-.03 1.25.3l2.29 2.29a.678.678 0 0 1-.063 1.015l-2.012 2.012a1.745 1.745 0 0 1-1.872.395c-2.084-.83-4.06-2.278-5.927-4.145C2.373 8.18.924 6.204.095 4.12A1.745 1.745 0 0 1 .49 2.248L2.502.236z"/>
            </svg>
            Gawat Darurat 24 Jam
        </a>
    </div>
</header>

<main class="main">
    @yield('content')
</main>

<footer id="footer" class="footer position-relative light-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ route('beranda') }}" class="logo d-flex align-items-center">
                    <span class="sitename">{{$company->nama}}</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>{{ $company->alamat }}</p>
                    <p class="mt-3"><strong>Telepon:</strong> <span>{{ implode('-', str_split($company->kontak, 4)) }}</span></p>
                    <p><strong>Email:</strong> <span>{{ $company->email }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    @forelse ($sosmeds as $sosmed)
                        <a href="{{ $sosmed->link }}" target="_blank">
                            {{-- LOGIKA UNTUK MENAMPILKAN IKON SESUAI PLATFORM --}}
                            @switch($sosmed->nama_sosmed)
                                @case('Facebook')
                                    <i class="bi bi-facebook"></i>
                                    @break
                                @case('Instagram')
                                    <i class="bi bi-instagram"></i>
                                    @break
                                @case('Tiktok')
                                    <i class="bi bi-tiktok"></i>
                                    @break
                                @case('Youtube')
                                    <i class="bi bi-youtube"></i>
                                    @break
                                @default
                                    <i class="bi bi-link"></i> {{-- Icon default jika platform tidak dikenali --}}
                            @endswitch
                        </a>
                    @empty
                        {{-- Tampilan alternatif jika tidak ada data sosmeds sama sekali --}}
                        <span>Tidak ada link media sosial yang terdaftar.</span>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Link Cepat</h4>
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ route('profil.tentang-kami') }}">Profil Kami</a></li>
                    <li><a href="{{ route('layanan.layanan') }}">Pelayanan</a></li>
                    <li><a href="{{ route('profil.dokter') }}">Jadwal Dokter</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Pelayanan Kami</h4>
                <ul>
                    <li><a href="#">Poli Penyakit Dalam</a></li>
                    <li><a href="#">Poli Bedah</a></li>
                    <li><a href="#">Poli Obgyn</a></li>
                    <li><a href="#">Rawat Inap</a></li>
                    <li><a href="#">IGD 24 Jam</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 footer-links">
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
                <h4>Jangkauan Wilayah</h4>
                <p>Melayani masyarakat dari {{ $totalItems }} kecamatan terdekat: {{$company->eksternal}}.</p>
            </div>
        </div>
    </div>
    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $company->nama }}</strong> <span>All Rights Reserved</span></p>
    </div>
</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
@stack('scripts')

</body>
</html>
