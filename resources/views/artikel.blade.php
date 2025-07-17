@extends('layouts.main')

@section('title', 'Tentang Kami - RSUD Sindangbarang')
@section('body-class', 'about-page')

@section('content')

    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Berita & Artikel</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>Berita & Artikel</h1>
            <p>Mengenal lebih jauh RSUD Sindangbarang sebagai rumah sakit unggulan yang mendukung terwujudnya masyarakat
                Cianjur sehat dan mandiri.</p>
        </div>
    </div>
    <section id="about" class="about section">
        {{-- isi disini content --}}
    </section>
@endsection
