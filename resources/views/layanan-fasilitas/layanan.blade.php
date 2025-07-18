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
            <p>Kami menyediakan layanan kesehatan yang komprehensif, mulai dari rawat jalan, rawat inap, hingga kondisi
                gawat darurat.</p>
        </div>
    </div>
    <section id="services" class="services section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="services-tabs">
                <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="200">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="services-primary-tab" data-bs-toggle="tab"
                            data-bs-target="#services-primary" type="button" role="tab">Rawat Jalan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="services-specialty-tab" data-bs-toggle="tab"
                            data-bs-target="#services-specialty" type="button" role="tab">Rawat Inap</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="services-diagnostics-tab" data-bs-toggle="tab"
                            data-bs-target="#services-diagnostics" type="button" role="tab">Layanan Penunjang</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="services-emergency-tab" data-bs-toggle="tab"
                            data-bs-target="#services-emergency" type="button" role="tab">Gawat Darurat</button>
                    </li>
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
                    </div>

                    <div class="tab-pane fade" id="services-specialty" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="service-item featured">
                                    <div class="service-icon-wrapper">
                                        <i class="fas fa-procedures"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Ruang Perawatan Biasa</h5>
                                        <p>Ruang rawat inap yang nyaman untuk pemulihan pasien dengan berbagai kondisi
                                            medis.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Perawatan Pasien Pria & Wanita</li>
                                            <li><i class="fa fa-check-circle"></i>Perawatan Pasien Anak</li>
                                            <li><i class="fa fa-check-circle"></i>Pengawasan Medis Berkala</li>
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
                                        <i class="fas fa-clinic-medical"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Ruang Isolasi</h5>
                                        <p>Fasilitas perawatan khusus untuk pasien dengan kondisi infeksius atau memerlukan
                                            pemisahan.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Standar Pencegahan Infeksi</li>
                                            <li><i class="fa fa-check-circle"></i>Ventilasi Terkontrol</li>
                                            <li><i class="fa fa-check-circle"></i>Pemantauan Khusus</li>
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
                                        <i class="fas fa-baby-carriage"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Ruang Bersalin & Nifas</h5>
                                        <p>Menyediakan fasilitas lengkap dan aman untuk proses persalinan hingga perawatan
                                            pasca-melahirkan.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Kamar Bersalin (VK)</li>
                                            <li><i class="fa fa-check-circle"></i>Perawatan Ibu Pasca Melahirkan</li>
                                            <li><i class="fa fa-check-circle"></i>Dukungan Laktasi</li>
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
                                        <i class="fa fa-user-nurse"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Perawatan Keperawatan</h5>
                                        <p>Tim perawat kami yang profesional dan peduli siap memberikan asuhan keperawatan
                                            terbaik.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Asuhan Keperawatan 24 Jam</li>
                                            <li><i class="fa fa-check-circle"></i>Edukasi Pasien & Keluarga</li>
                                            <li><i class="fa fa-check-circle"></i>Pendampingan Selama Perawatan</li>
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

                    <div class="tab-pane fade" id="services-diagnostics" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="service-item">
                                    <div class="service-icon-wrapper">
                                        <i class="fa fa-vial"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Laboratorium</h5>
                                        <p>Menyediakan layanan pemeriksaan sampel untuk membantu penegakan diagnosis yang
                                            akurat.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Pemeriksaan Darah Lengkap</li>
                                            <li><i class="fa fa-check-circle"></i>Tes Urine</li>
                                            <li><i class="fa fa-check-circle"></i>Pemeriksaan Kimia Klinik</li>
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
                                        <i class="fa fa-x-ray"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Radiologi</h5>
                                        <p>Layanan pencitraan medis untuk melihat kondisi bagian dalam tubuh pasien.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Rontgen (X-Ray)</li>
                                            <li><i class="fa fa-check-circle"></i>Ultrasonografi (USG)</li>
                                            <li><i class="fa fa-check-circle"></i>Layanan Cepat dan Akurat</li>
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
                                        <i class="fas fa-pills"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Instalasi Farmasi</h5>
                                        <p>Menjamin ketersediaan obat-obatan yang aman, berkualitas, dan terjangkau bagi
                                            pasien.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Pelayanan Resep Rawat Jalan</li>
                                            <li><i class="fa fa-check-circle"></i>Pelayanan Obat Rawat Inap</li>
                                            <li><i class="fa fa-check-circle"></i>Konseling Penggunaan Obat</li>
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

                    <div class="tab-pane fade" id="services-emergency" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="service-item emergency-highlight">
                                    <div class="service-icon-wrapper">
                                        <i class="fa fa-ambulance"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>Gawat Darurat Umum & Kebidanan 24 Jam</h5>
                                        <p>Tim medis kami selalu siaga 24 jam untuk memberikan pertolongan pertama pada
                                            kasus gawat darurat, baik untuk umum maupun kasus kebidanan.</p>
                                        <ul class="service-benefits">
                                            <li><i class="fa fa-check-circle"></i>Buka 24 Jam, 7 Hari Seminggu</li>
                                            <li><i class="fa fa-check-circle"></i>Tim Medis Cepat Tanggap</li>
                                            <li><i class="fa fa-check-circle"></i>Penanganan Kasus Trauma</li>
                                            <li><i class="fa fa-check-circle"></i>Pertolongan Pertama Kebidanan</li>
                                        </ul>
                                        <div class="emergency-actions">
                                            <a href="tel:082130677599" class="btn-emergency">
                                                <i class="fa fa-phone"></i>
                                                <span>Hubungi IGD: 0821-3067-7599</span>
                                            </a>
                                            <a href="contact.html" class="btn-directions">
                                                <i class="fa fa-map-marker-alt"></i>
                                                <span>Lihat Peta Lokasi</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
