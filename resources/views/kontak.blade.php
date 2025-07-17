@extends('layouts.main')

@section('title', 'Kontak Kami - RSUD Sindangbarang')
@section('body-class', 'contact-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a>
                    </li>
                    <li class="breadcrumb-item active current">Kontak</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Hubungi Kami</h1>
            <p>
                Kami siap membantu Anda. Silakan hubungi kami melalui detail kontak
                di bawah atau kirimkan pesan melalui formulir.
            </p>
        </div>
    </div>
    <section id="contact" class="contact section">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-info-panel">
                    <div class="contact-info-header">
                        <h3>Informasi Kontak</h3>
                        <p>
                            Berikut adalah detail kontak dan alamat RSUD Sindangbarang
                            yang dapat Anda hubungi.
                        </p>
                    </div>

                    <div class="contact-info-cards">
                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-pin-map-fill"></i>
                            </div>
                            <div class="card-content">
                                <h4>Alamat Kami</h4>
                                <p>Jl. Raya Sindangbarang-Cidaun KM.01, Cianjur 43272</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-envelope-open"></i>
                            </div>
                            <div class="card-content">
                                <h4>Email Kami</h4>
                                <p>kontak@rsudsindangbarang.com</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="card-content">
                                <h4>Telepon (Hotline)</h4>
                                <p>0821-3067-7599</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="card-content">
                                <h4>Jam Layanan</h4>
                                <p>
                                    Pendaftaran: Senin - Jumat (08:00 - 12:00)<br />IGD: 24
                                    Jam
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links-panel">
                        <h5>Ikuti Kami</h5>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/rsud.sindangbarang" target="_blank"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/rsudsindangbarang/" target="_blank"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://www.tiktok.com/@rsud_sindangbarang" target="_blank"><i
                                    class="bi bi-tiktok"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="contact-form-panel">
                    <div class="map-container" style="width: 100%; height: 400px; border-radius: 8px; overflow: hidden;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.776352945151!2d106.91187731526685!3d-7.918432881010376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e82b73714e6f%3A0x6d9f5a7788484e55!2sRSUD%20Sindangbarang!5e0!3m2!1sen!2sid!4v1672233445566!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>


                    <div class="form-container">
                        <h3>Kirim Pesan Kepada Kami</h3>
                        <p>
                            Jika ada pertanyaan atau masukan, silakan isi formulir di
                            bawah ini.
                        </p>

                        <form action="#" method="post" class="php-email-form">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nameInput" name="name"
                                    placeholder="Nama Lengkap" required="" />
                                <label for="nameInput">Nama Lengkap</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="emailInput" name="email"
                                    placeholder="Alamat Email" required="" />
                                <label for="emailInput">Alamat Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="subjectInput" name="subject"
                                    placeholder="Subjek" required="" />
                                <label for="subjectInput">Subjek</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="messageInput" name="message" rows="5" placeholder="Pesan Anda"
                                    style="height: 150px" required=""></textarea>
                                <label for="messageInput">Pesan Anda</label>
                            </div>

                            <div class="my-3">
                                <div class="loading">Memuat</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn-submit">Kirim Pesan <i
                                        class="bi bi-send-fill ms-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
