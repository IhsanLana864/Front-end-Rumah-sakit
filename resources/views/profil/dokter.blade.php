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
      <p>Perkenalkan tim profesional berdedikasi kami yang siap memberikan pelayanan kesehatan terbaik untuk Anda dan keluarga.</p>
    </div>
  </div>
  <section id="doctors" class="doctors section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        {{-- Content from doctors.html main tag goes here --}}
        {{-- Remember to change image paths with asset() and appointment links to '#' --}}
    </div>
  </section>

@endsection
