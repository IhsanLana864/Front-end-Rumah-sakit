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
                <ul class="nav nav-tabs justify-content-center" role="tablist" data-aos="fade-up" data-aos-delay="200">
                    @php use Illuminate\Support\Str; @endphp
                    @forelse ($instalasis as $instalasi)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                id="{{ Str::slug($instalasi->nama_instalasi) }}-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#{{ Str::slug($instalasi->nama_instalasi) }}-pane"
                                type="button"
                                role="tab"
                                aria-controls="{{ Str::slug($instalasi->nama_instalasi) }}-pane"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                {{ $instalasi->nama_instalasi }}
                            </button>
                        </li>
                    @empty
                        <li class="nav-item"><span class="nav-link">Belum ada instalasi.</span></li>
                    @endforelse
                </ul>

                {{-- BAGIAN KONTEN TAB DINAMIS --}}
                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                    @forelse ($instalasis as $instalasi)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="{{ Str::slug($instalasi->nama_instalasi) }}-pane" {{-- KESALAHAN # DI SINI DIHAPUS --}}
                            role="tabpanel"
                            aria-labelledby="{{ Str::slug($instalasi->nama_instalasi) }}-tab"
                            tabindex="0">
                            <div class="row g-4">
                                @forelse ($instalasi->subInstalasis as $subInstalasi)
                                    <div class="col-lg-6">
                                        <div class="service-item">
                                            <div class="service-icon-wrapper">
                                                @if ($subInstalasi->logo)
                                                    <i class="bi bi-{{ $subInstalasi->logo }}"></i>
                                                @else
                                                    <i class="fa fa-stethoscope"></i>
                                                @endif
                                            </div>
                                            <div class="service-details">
                                                <h5>{{ $subInstalasi->nama_sub }}</h5>
                                                <p>{{ $subInstalasi->keterangan ?? 'Deskripsi layanan belum tersedia.' }}</p>
                                                <!-- <ul class="service-benefits">
                                                    @if (isset($subInstalasi->benefits) && !empty($subInstalasi->benefits))
                                                        @php
                                                            $benefitsArray = explode(',', $subInstalasi->benefits);
                                                        @endphp
                                                        @foreach ($benefitsArray as $benefit)
                                                            <li><i class="fa fa-check-circle"></i>{{ trim($benefit) }}</li>
                                                        @endforeach
                                                    @else
                                                        <li><i class="fa fa-info-circle"></i>Manfaat belum terdaftar secara spesifik.</li>
                                                    @endif
                                                </ul> -->
                                                <!-- <a href="{{ url('service-details.html') }}" class="service-link">
                                                    <span>Lihat Detail</span>
                                                    <i class="fa fa-arrow-right"></i>
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-5">
                                        <p>Belum ada sub-layanan terdaftar untuk instalasi ini.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p>Tidak ada instalasi yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>


            <div class="container my-5" data-aos="fade-up" data-aos-delay="300">
                <div class="section-title text-center mb-4">
                    <h2>Jadwal Layanan</h2>
                    <p>Temukan jadwal pendaftaran dan praktek untuk setiap layanan poliklinik kami.</p>
                </div>

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
                            @forelse ($layanans as $layanan)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-start">{{ $layanan->pelayanan }}</td>
                                    <td>{{ $layanan->hari }}</td>
                                    <td>
                                        @if ($layanan->jam_pendaftaran_awal && $layanan->jam_pendaftaran_akhir)
                                            {{ \Carbon\Carbon::parse($layanan->jam_pendaftaran_awal)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($layanan->jam_pendaftaran_akhir)->format('H:i') }}
                                        @else
                                            Kosong
                                        @endif
                                    </td>
                                    <td>
                                        @if ($layanan->jam_praktek_awal)
                                            {{ \Carbon\Carbon::parse($layanan->jam_praktek_awal)->format('H:i') }} -
                                            @if ($layanan->jam_praktek_akhir)
                                                {{ \Carbon\Carbon::parse($layanan->jam_praktek_akhir)->format('H:i') }}
                                            @else
                                                Selesai
                                            @endif
                                        @else
                                            Kosong
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada jadwal layanan yang tersedia.</td>
                                </tr>
                            @endforelse
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