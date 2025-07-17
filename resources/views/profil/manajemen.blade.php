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
      <p>Perkenalkan tim manajerial yang berdedikasi untuk memastikan operasional dan pelayanan di RSUD Sindangbarang berjalan optimal.</p>
    </div>
  </div>
  <section id="doctors" class="doctors section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        {{-- Content from manajemen.html main tag goes here --}}
        {{-- Remember to change image paths with asset() --}}
    </div>
  </section>

@endsection
