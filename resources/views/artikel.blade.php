@extends('layouts.main')

@section('title', 'Berita & Artikel - RSUD Sindangbarang')
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
            <p>Mengenal lebih jauh {{ $company->nama }} sebagai rumah sakit unggulan yang mendukung terwujudnya masyarakat
                Cianjur sehat dan mandiri.</p>
        </div>
    </div>
    <section class="blog section-space">
        <div class="container">
            <div class="row g-4">
                @forelse ($beritas as $berita)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog__item h-100 d-flex flex-column">
                            <a href="{{ route('detail-berita', $berita->id) }}"
                                class="blog__item-media d-block position-relative overflow-hidden rounded-3">
                                <div class="panel wow"></div>
                                <img class="img-fluid" src="{{ asset('storage/' . $berita->gambar) }}"
                                    alt="Kegiatan Bakti Sosial RSUD Sindangbarang">
                                <span class="blog__item-category">{{ $berita->kategori }}</span>
                            </a>
                            <div class="blog__item-content d-flex flex-column flex-grow-1">
                                <div class="blog__item-content-date mb-15 mb-xs-10"><i class="fa-solid fa-calendar-days"></i>
                                    <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span></div>
                                <h4 class="mb-15 mb-xs-10"><a href="{{ route('detail-berita', $berita->id) }}">{{ $berita->judul }}</a></h4>
                                <p class="mb-40 mb-xs-30">
                                    @if ($berita->detail)
                                        @php
                                            $words = explode(' ', $berita->detail); // Pecah detail menjadi array kata
                                            $limitedWords = array_slice($words, 0, 15); // Ambil 15 kata pertama
                                            $output = implode(' ', $limitedWords); // Gabungkan kembali menjadi string
                                        @endphp

                                        {{ $output }}
                                        @if (count($words) > 15) {{-- Cek apakah jumlah kata asli lebih dari 15 --}}
                                            ...
                                        @endif
                                    @else
                                        -
                                    @endif
                                </p>
                                <a class="rr-a-btn mt-auto" href="{{ route('detail-berita', $berita->id) }}">Baca Selengkapnya <i
                                        class="fa-solid fa-circle-plus"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <span colspan="5" class="text-center">Tidak ada berita atau artikel.</span>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
