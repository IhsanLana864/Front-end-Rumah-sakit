@extends('layouts.main')

@section('title', 'Layanan Kami - RSUD Sindangbarang')
@section('body-class', 'services-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Layanan</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Layanan</h1>
            <p>Kami menyediakan layanan kesehatan yang komprehensif.</p>
        </div>
    </div>
    <section id="services" class="services section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="services-tabs">
                <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="200">
                    @forelse ($instalasis as $instalasi)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" {{-- TAMBAHKAN LOGIKA INI --}}
                                id="{{ $instalasi->nama_instalasi }}-tab" {{-- Disarankan ID button tab diakhiri '-tab' --}}
                                data-bs-toggle="tab"
                                data-bs-target="#{{ $instalasi->nama_instalasi }}-pane" {{-- Disarankan data-bs-target ke ID pane diakhiri '-pane' --}}
                                type="button"
                                role="tab"
                                aria-controls="{{ $instalasi->nama_instalasi }}-pane" {{-- Tambahkan untuk aksesibilitas --}}
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"> {{-- Tambahkan untuk aksesibilitas --}}
                                {{ $instalasi->nama_instalasi }}
                            </button>
                        </li>
                    @empty
                        <div class="text-center">
                            <span>Belum ada instalasi.</span>
                        </div>
                    @endforelse
                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                    <div class="tab-pane fade show active" id="services-primary" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="service-item">
                                    <div class="service-icon-wrapper">
                                        <i class="fa fa-stethoscope"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Poliklinik Penyakit Dalam</h5>
                                        <p>Layanan diagnosis dan penanganan non-bedah untuk kelainan pada organ dalam.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Konsultasi Dokter Spesialis</li>
                                            <li><i class="fa fa-check-circle"></i>Manajemen Penyakit Kronis</li>
                                            <li><i class="fa fa-check-circle"></i>Pemeriksaan Komprehensif</li>
                                        </ul>
                                        <a href="service-details.html" class="service-link">
                                            <span>Lihat Detail</span>
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- <div class="tab-pane fade show active" id="services-primary" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="service-item">
                                    <div class="service-icon-wrapper">
                                        <i class="fa fa-stethoscope"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Poliklinik Penyakit Dalam</h5>
                                        <p>Layanan diagnosis dan penanganan non-bedah untuk kelainan pada organ dalam.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Konsultasi Dokter Spesialis</li>
                                            <li><i class="fa fa-check-circle"></i>Manajemen Penyakit Kronis</li>
                                            <li><i class="fa fa-check-circle"></i>Pemeriksaan Komprehensif</li>
                                        </ul>
                                        <a href="service-details.html" class="service-link">
                                            <span>Lihat Detail</span>
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="service-item">
                                    <div class="service-icon-wrapper">
                                        <i class="fas fa-cut"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Poliklinik Bedah</h5>
                                        <p>Menangani berbagai kondisi medis yang memerlukan prosedur pembedahan.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Bedah Umum</li>
                                            <li><i class="fa fa-check-circle"></i>Perawatan Luka Paska Operasi</li>
                                            <li><i class="fa fa-check-circle"></i>Konsultasi Bedah</li>
                                        </ul>
                                        <a href="service-details.html" class="service-link">
                                            <span>Lihat Detail</span>
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="service-item">
                                    <div class="service-icon-wrapper">
                                        <i class="fa fa-baby"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Poliklinik Obstetri & Ginekologi</h5>
                                        <p>Pelayanan lengkap untuk kesehatan ibu, kehamilan, dan sistem reproduksi wanita.
                                        </p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Pemeriksaan Kehamilan (ANC)</li>
                                            <li><i class="fa fa-check-circle"></i>Program Keluarga Berencana (KB)</li>
                                            <li><i class="fa fa-check-circle"></i>Konsultasi Kesehatan Kewanitaan</li>
                                        </ul>
                                        <a href="service-details.html" class="service-link">
                                            <span>Lihat Detail</span>
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="service-item">
                                    <div class="service-icon-wrapper">
                                        <i class="fas fa-tooth"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Poliklinik Gigi & Mulut</h5>
                                        <p>Menyediakan perawatan gigi dan mulut untuk menjaga senyum sehat Anda.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Pemeriksaan & Pembersihan</li>
                                            <li><i class="fa fa-check-circle"></i>Penambalan dan Pencabutan</li>
                                            <li><i class="fa fa-check-circle"></i>Edukasi Kesehatan Gigi</li>
                                        </ul>
                                        <a href="service-details.html" class="service-link">
                                            <span>Lihat Detail</span>
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>


            <div class="container my-5" data-aos="fade-up" data-aos-delay="300">

                <div class="section-title text-center mb-4">
                    <h2>Jadwal Layanan</h2>
                    <p>Temukan jadwal pendaftaran dan praktek untuk setiap layanan poliklinik kami.</p>
                </div>

                {{-- Wrapper untuk membuat tabel responsif --}}
                <div class="table-responsive shadow-sm rounded">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col" style="width: 5%;">No.</th>
                                <th scope="col">Pelayanan</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam Pendaftaran</th>
                                <th scope="col">Jam Praktek</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">1</th>
                                <td class="text-start">Pelayanan Umum</td>
                                <td>Senin - Jumat</td>
                                <td>08:00 - 12:00</td>
                                <td>08:00 - 12:00</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td class="text-start">Kesehatan Gigi dan Mulut</td>
                                <td>Senin - Jumat</td>
                                <td>08:00 - 12:00</td>
                                <td>08:00 - 12:00</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td class="text-start">Poliklinik Penyakit Dalam</td>
                                <td>Kamis</td>
                                <td>13:00 - 15:00</td>
                                <td>16:00 - Selesai</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td class="text-start">Poliklinik Bedah</td>
                                <td>Selasa</td>
                                <td>13:00 - 15:00</td>
                                <td>15:00 - Selesai</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td class="text-start">Poliklinik Obstetri dan Ginekologi</td>
                                <td>Kamis & Jumat</td>
                                <td>13:00 - 15:00</td>
                                <td>16:00 - 18:00</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td class="text-start">Poliklinik Anestesi</td>
                                <td>Senin & Jumat</td>
                                <td>13:00 - 15:00</td>
                                <td>15:00 - Selesai</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="services-cta" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <div class="cta-content">
                            <i class="fa fa-calendar-check"></i>
                            <h3>Siap Menjadwalkan Kunjungan Anda?</h3>
                            <p>Buat janji temu dengan dokter poliklinik kami dengan mudah. Hubungi kami untuk informasi
                                lebih lanjut mengenai jadwal dokter.</p>
                            <div class="cta-buttons">
                                <a href="#" class="btn-book">Buat Janji Temu</a>
                                <a href="{{ route('kontak') }}" class="btn-contact">Hubungi Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- ini debug  --}}