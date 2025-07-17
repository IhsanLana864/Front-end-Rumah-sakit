@extends('layouts.main')

@section('title', 'Kegiatan - RSUD Sindangbarang')
@section('body-class', 'gallery-page')

@section('content')

  <div class="page-title">
    <div class="breadcrumbs">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
          <li class="breadcrumb-item active current">Kegiatan</li>
        </ol>
      </nav>
    </div>
    <div class="title-wrapper">
      <h1>Kegiatan</h1>
      <p>Dokumentasi berbagai kegiatan yang kami selenggarakan sebagai bagian dari komitmen kami terhadap kesehatan masyarakat.</p>
    </div>
  </div>
  <section id="gallery" class="gallery section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
        <div class="col-lg-12">
            <ul class="gallery-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">Semua</li>
                <li data-filter=".filter-penyuluhan">Penyuluhan</li>
                <li data-filter=".filter-baksos">Bakti Sosial</li>
                <li data-filter=".filter-internal">Internal</li>
            </ul>
        </div>
    </div>

    <div class="row g-4 isotope-layout" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-penyuluhan">
            <div class="gallery-card">
                <div class="gallery-img">
                    <img src="{{ asset('assets/img/gallery/gallery-1.webp') }}" class="img-fluid" alt="Penyuluhan Kesehatan" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4>Penyuluhan Stunting</h4>
                            <p>Edukasi kepada masyarakat mengenai pentingnya gizi untuk mencegah stunting.</p>
                            <a href="{{ asset('assets/img/gallery/gallery-1.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-baksos">
            <div class="gallery-card">
                <div class="gallery-img">
                    <img src="{{ asset('assets/img/gallery/gallery-2.webp') }}" class="img-fluid" alt="Bakti Sosial" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4>Pengobatan Gratis</h4>
                            <p>Kegiatan bakti sosial berupa pemeriksaan dan pengobatan gratis untuk warga.</p>
                            <a href="{{ asset('assets/img/gallery/gallery-2.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-internal">
            <div class="gallery-card">
                <div class="gallery-img">
                    <img src="{{ asset('assets/img/gallery/gallery-3.webp') }}" class="img-fluid" alt="Kegiatan Internal" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4>Pelatihan Karyawan</h4>
                            <p>Peningkatan kompetensi SDM melalui pelatihan internal berkala.</p>
                            <a href="{{ asset('assets/img/gallery/gallery-3.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-penyuluhan">
            <div class="gallery-card">
                <div class="gallery-img">
                    <img src="{{ asset('assets/img/gallery/gallery-4.webp') }}" class="img-fluid" alt="Penyuluhan PHBS" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4>Sosialisasi PHBS</h4>
                            <p>Mengajak masyarakat menerapkan Perilaku Hidup Bersih dan Sehat.</p>
                            <a href="{{ asset('assets/img/gallery/gallery-4.webp') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> </div> ```
  </section>

@endsection
