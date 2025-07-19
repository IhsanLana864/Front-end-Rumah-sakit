@extends('layouts.main')

@section('title', 'RSUD Sindangbarang - Pelayanan Kesehatan Unggulan')
@section('body-class', 'index-page')

@section('content')

    <section id="hero" class="hero section dark-background">
        <div class="container-fluid p-0">
            <div class="hero-wrapper">
                <div class="hero-image">
                @if ($banners->gambar)
                    <img src="{{ asset('storage/' . $banners->gambar) }}" alt="{{ $banners->keterangan }}" class="img-fluid" />
                @else
                    <div class="bg-light p-4 rounded mb-3">
                        <p class="text-muted">Tidak ada gambar untuk banner ini.</p>
                    </div>
                @endif
                </div>

                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-10" data-aos="fade-right" data-aos-delay="100">
                                <div class="content-box">
                                    @if ($company->motto)
                                        <span class="badge-accent" data-aos="fade-up" data-aos-delay="150">{{ $company->motto }}</span>
                                    @else
                                        <span class="badge-accent" data-aos="fade-up" data-aos-delay="150">Motto</span>
                                    @endif

                                    @if ($company->motto)
                                        <h1 data-aos="fade-up" data-aos-delay="200">{{ $company->visi }}</h1>
                                    @else
                                        <h1 data-aos="fade-up" data-aos-delay="200">Menjadi Rumah Sakit Unggulan yang Mendukung Terwujudnya Masyarakat Cianjur Sehat dan Mandiri</h1>
                                    @endif
                                    <p data-aos="fade-up" data-aos-delay="250">
                                        Memberikan pelayanan kesehatan Humanis dan Paripurna
                                        serta membina jaringan kemitraan dan rujukan guna
                                        meningkatkan derajat kesehatan masyarakat.
                                    </p>

                                    <div class="cta-group" data-aos="fade-up" data-aos-delay="300">
                                        <a href="#" class="btn btn-primary">Buat Janji</a>
                                        <a href="{{ route('layanan.layanan') }}" class="btn btn-outline">Lihat Pelayanan
                                            Kami</a>
                                    </div>

                                    <div class="info-badges" data-aos="fade-up" data-aos-delay="350">
                                        <div class="badge-item">
                                            <i class="bi bi-telephone-fill"></i>
                                            <div class="badge-content">
                                                <span>Hotline IGD 24 Jam</span>
                                                @if ($company->kontak)
                                                    <strong>{{ implode('-', str_split($company->kontak, 4)) }}</strong>
                                                @else
                                                    <strong>TBA</strong>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="badge-item">
                                            <i class="bi bi-clock-fill"></i>
                                            <div class="badge-content">
                                                <span>Jam Pendaftaran</span>
                                                <strong>Senin-Jumat: 08:00-12:00</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="features-wrapper">
                            <div class="row gy-4">
                                <div class="col-lg-4">
                                    <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                                        <div class="feature-icon">
                                            <i class="bi bi-heart-pulse-fill"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h3>Pelayanan Berkualitas</h3>
                                            <p>
                                                Menyediakan pelayanan kesehatan yang berkualitas dan
                                                juga berkelanjutan untuk masyarakat.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                                        <div class="feature-icon">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h3>Partisipasi Masyarakat</h3>
                                            <p>
                                                Meningkatkan kesadaran dan partisipasi aktif
                                                masyarakat dalam menjaga kesehatan.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="feature-item" data-aos="fade-up" data-aos-delay="550">
                                        <div class="feature-icon">
                                            <i class="bi bi-pc-display"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h3>Optimalisasi Teknologi</h3>
                                            <p>
                                                Mengoptimalkan sumber daya dan teknologi terkini
                                                dalam setiap pelayanan kesehatan.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="home-about" class="home-about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="about-image">
                        <img src="{{ asset('assets/img/health/facilities-1.webp') }}" alt="Modern Healthcare Facility"
                            class="img-fluid rounded-3 mb-4" />
                        <div class="experience-badge">
                            <span class="years">Tipe D</span>
                            <span class="text">Non Pendidikan</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="about-content">
                        <h2>Berkomitmen pada Pelayanan Pasien yang Profesional</h2>
                        <p class="lead">
                            Sebagai rumah sakit milik Pemerintah Daerah Kabupaten Cianjur,
                            kami berdedikasi untuk memberikan layanan terbaik.
                        </p>
                        <p>
                            Dengan total luas tanah 49.982 M² dan luas bangunan 2776,78
                            M², kami didukung oleh fasilitas memadai seperti listrik PLN
                            33.000 VA, air dari sumur bor, area parkir luas, serta
                            keamanan oleh satpam dan CCTV untuk kenyamanan dan keselamatan
                            pasien.
                        </p>

                        <div class="row g-4 mt-4">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="bi bi-person-check"></i>
                                    </div>
                                    <h4>Profesional</h4>
                                    <p>
                                        Bekerja sesuai standar kompetensi dan etika profesi yang
                                        tinggi.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="bi bi-lightbulb"></i>
                                    </div>
                                    <h4>Visioner & Kerjasama</h4>
                                    <p>
                                        Berorientasi ke depan dan mengutamakan kolaborasi tim
                                        yang solid.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="cta-wrapper mt-4">
                            <a href="{{ route('profil.tentang-kami') }}" class="btn btn-primary">Profil Lengkap</a>
                            <a href="{{ route('profil.dokter') }}" class="btn btn-outline">Temui Tim Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="featured-departments" class="featured-departments section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Pelayanan Unggulan Kami</h2>
            <p>
                Kami menyediakan berbagai instalasi dan unit pelayanan medik dan
                keperawatan untuk memenuhi kebutuhan kesehatan Anda.
            </p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="{{ asset('assets/img/health/cardiology-3.webp') }}" alt="Cardiology Department"
                                class="img-fluid" />
                        </div>
                        <div class="department-content">
                            <div class="department-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h3>Poliklinik Penyakit Dalam</h3>
                            <p>
                                Pelayanan untuk diagnosis dan penanganan berbagai penyakit
                                organ dalam tanpa bedah.
                            </p>
                            <a href="#" class="btn-learn-more">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="{{ asset('assets/img/health/neurology-2.webp') }}" alt="Neurology Department"
                                class="img-fluid" />
                        </div>
                        <div class="department-content">
                            <div class="department-icon">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                            <h3>Poliklinik Bedah</h3>
                            <p>
                                Menangani kasus-kasus yang memerlukan tindakan pembedahan
                                oleh dokter spesialis.
                            </p>
                            <a href="#" class="btn-learn-more">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="{{ asset('assets/img/health/orthopedics-4.webp') }}" alt="Orthopedics Department"
                                class="img-fluid" />
                        </div>
                        <div class="department-content">
                            <div class="department-icon">
                                <i class="fas fa-female"></i>
                            </div>
                            <h3>Poliklinik Obstetri & Ginekologi</h3>
                            <p>
                                Layanan kesehatan komprehensif untuk kehamilan, persalinan,
                                dan kesehatan reproduksi wanita.
                            </p>
                            <a href="#" class="btn-learn-more">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="{{ asset('assets/img/health/pediatrics-3.webp') }}" alt="Pediatrics Department"
                                class="img-fluid" />
                        </div>
                        <div class="department-content">
                            <div class="department-icon">
                                <i class="fas fa-baby"></i>
                            </div>
                            <h3>Instalasi Rawat Inap Anak</h3>
                            <p>
                                Perawatan intensif dan nyaman bagi pasien anak-anak yang
                                memerlukan rawat inap.
                            </p>
                            <a href="#" class="btn-learn-more">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="{{ asset('assets/img/health/oncology-4.webp') }}" alt="Oncology Department"
                                class="img-fluid" />
                        </div>
                        <div class="department-content">
                            <div class="department-icon">
                                <i class="fas fa-tooth"></i>
                            </div>
                            <h3>Poliklinik Kesehatan Gigi & Mulut</h3>
                            <p>
                                Pelayanan kesehatan gigi dan mulut, mulai dari pemeriksaan
                                hingga tindakan medis.
                            </p>
                            <a href="#" class="btn-learn-more">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="department-card">
                        <div class="department-image">
                            <img src="{{ asset('assets/img/health/emergency-2.webp') }}" alt="Emergency Department"
                                class="img-fluid" />
                        </div>
                        <div class="department-content">
                            <div class="department-icon">
                                <i class="fas fa-ambulance"></i>
                            </div>
                            <h3>Gawat Darurat 24 Jam</h3>
                            <p>
                                Siap melayani kasus gawat darurat umum dan kebidanan selama
                                24 jam penuh.
                            </p>
                            <a href="#" class="btn-learn-more">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="find-a-doctor" class="find-a-doctor section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Temukan Dokter Kami</h2>
            <p>
                Berikut adalah daftar dokter spesialis dan umum yang berpraktik di
                RSUD Sindangbarang.
            </p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-12">
                    <div class="search-container">
                        <form class="search-form" action="#" method="get">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="doctor_name"
                                        placeholder="Cari nama dokter" />
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" name="specialty" id="specialty-select">
                                        <option value="">Pilih Spesialisasi</option>
                                        <option value="penyakit-dalam">Penyakit Dalam</option>
                                        <option value="bedah">Bedah</option>
                                        <option value="obgyn">Obstetri & Ginekologi</option>
                                        <option value="anestesi">Anestesi</option>
                                        <option value="gigi">Gigi</option>
                                        <option value="umum">Umum</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="bi bi-search me-2"></i>Cari Dokter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="400">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="doctor-card">
                        <div class="doctor-image">
                            <img src="{{ asset('assets/img/health/staff-3.webp') }}" alt="dr.M.Lucky N Prameswara,Sp.PD"
                                class="img-fluid" />
                        </div>
                        <div class="doctor-info">
                            <h5>dr. M. Lucky N Prameswara, Sp.PD</h5>
                            <p class="specialty">Dokter Spesialis Penyakit Dalam</p>
                            <div class="appointment-actions">
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                                <a href="#" class="btn btn-primary btn-sm">Buat Janji</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="doctor-card">
                        <div class="doctor-image">
                            <img src="{{ asset('assets/img/health/staff-7.webp') }}" alt="dr.Teguh Karyadi, Sp.B"
                                class="img-fluid" />
                        </div>
                        <div class="doctor-info">
                            <h5>dr. Teguh Karyadi, Sp.B</h5>
                            <p class="specialty">Dokter Spesialis Bedah</p>
                            <div class="appointment-actions">
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                                <a href="#" class="btn btn-primary btn-sm">Buat Janji</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="doctor-card">
                        <div class="doctor-image">
                            <img src="{{ asset('assets/img/health/staff-1.webp') }}" alt="dr.Tendi Robby Setia, Sp.OG"
                                class="img-fluid" />
                        </div>
                        <div class="doctor-info">
                            <h5>dr. Tendi Robby Setia, Sp.OG</h5>
                            <p class="specialty">
                                Dokter Spesialis Obstetri dan Ginekologi
                            </p>
                            <div class="appointment-actions">
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                                <a href="#" class="btn btn-primary btn-sm">Buat Janji</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="doctor-card">
                        <div class="doctor-image">
                            <img src="{{ asset('assets/img/health/staff-9.webp') }}"
                                alt="dr. Azka Putra Rakhmatullah, Sp.An" class="img-fluid" />
                        </div>
                        <div class="doctor-info">
                            <h5>dr. Azka Putra Rakhmatullah, Sp.An</h5>
                            <p class="specialty">Dokter Spesialis Anestesi</p>
                            <div class="appointment-actions">
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                                <a href="#" class="btn btn-primary btn-sm">Buat Janji</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="doctor-card">
                        <div class="doctor-image">
                            <img src="{{ asset('assets/img/health/staff-5.webp') }}" alt="drg. Ridho Akhri Prianto"
                                class="img-fluid" />
                        </div>
                        <div class="doctor-info">
                            <h5>drg. Ridho Akhri Prianto</h5>
                            <p class="specialty">Dokter Gigi</p>
                            <div class="appointment-actions">
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                                <a href="#" class="btn btn-primary btn-sm">Buat Janji</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="doctor-card">
                        <div class="doctor-image">
                            <img src="{{ asset('assets/img/health/staff-12.webp') }}" alt="dr.Fasya Sophia Septiavina"
                                class="img-fluid" />
                        </div>
                        <div class="doctor-info">
                            <h5>dr. Fasya Sophia Septiavina</h5>
                            <p class="specialty">Dokter Umum</p>
                            <div class="appointment-actions">
                                <a href="#" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
                                <a href="#" class="btn btn-primary btn-sm">Buat Janji</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="call-to-action" class="call-to-action section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 data-aos="fade-up" data-aos-delay="200">
                        Kesehatan Anda Adalah Prioritas Kami
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="250">
                        Kami selalu siap memberikan pelayanan medis terbaik. Jangan ragu
                        untuk menghubungi kami atau membuat janji temu dengan dokter
                        pilihan Anda.
                    </p>
                    <div class="cta-buttons" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="btn-primary">Buat Janji Temu</a>
                        <a href="{{ route('profil.dokter') }}" class="btn-secondary">Cari Dokter</a>
                    </div>
                </div>
            </div>

            <div class="emergency-alert" data-aos="zoom-in" data-aos-delay="500">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="emergency-content">
                            <div class="emergency-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="emergency-text">
                                <h4>Kondisi Gawat Darurat?</h4>
                                <p>Hubungi hotline 24/7 kami untuk bantuan segera.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-end">
                        <a href="tel:082130677599" class="emergency-btn">
                            <i class="bi bi-telephone-fill"></i>
                            Hubungi 0821-3067-7599
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
