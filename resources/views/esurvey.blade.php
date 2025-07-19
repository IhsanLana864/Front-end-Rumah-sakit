@extends('layouts.main')

@section('title', 'RSUD Sindangbarang - Pelayanan Kesehatan Unggulan')
@section('body-class', 'index-page')

@section('content')
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">E-Survey</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper">
            <h1>E-Survey</h1>
            <p>Berpartisipasilah dalam survei kami untuk membantu meningkatkan pelayanan {{ $company->nama }} demi kenyamanan
                dan kepuasan Anda.</p>
        </div>
    </div>

    <div class="containerSurvey">
        <div class="row">
            <section class="pricing-appointment section-space">
                <div class="containerSurvey container">

                    <div class="row align-items-end mb-60 mb-sm-50 mb-xs-40">
                        <div class="col-12">
                            <div class="section__title-wrapper d-flex align-items-center gap-3">
                                <img src="{{ asset('assets/img/e-survey/e-survey.svg') }}" alt="E-Survey Icon"
                                    class="img-fluid" style="width: 40px; height: auto;">
                                <h2 class="section__title mb-0 title-animation">KUESIONER SURVEI KEPUASAN MASYARAKAT (SKM)
                                </h2>
                            </div>
                        </div>
                    </div>

                    <form id="kuesioner-skm-form" method="POST" action="{{ route('submit.survey') }}" class="mt-md-60 mt-sm-60 mt-xs-60">
                        @csrf

                        {{-- Menampilkan pesan sukses --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Menampilkan pesan error --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Menampilkan error validasi Laravel --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <hr>
                        <h4 class="text-center">PROFIL</h4>
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Jenis kelamin <span class="text-danger">*</span></label>
                            <div class="col-md-10 d-flex align-items-center">
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="L"
                                        id="kelaminL" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kelaminL">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P"
                                        id="kelaminP" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kelaminP">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Pendidikan <span class="text-danger">*</span></label>
                            <div class="col-md-10 d-flex align-items-center flex-wrap">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pendidikan" value="SD"
                                        id="pendidikanSD" {{ old('pendidikan') == 'SD' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pendidikanSD">SD</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pendidikan" value="SMP"
                                        id="pendidikanSMP" {{ old('pendidikan') == 'SMP' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pendidikanSMP">SMP</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pendidikan" value="SMA"
                                        id="pendidikanSMA" {{ old('pendidikan') == 'SMA' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pendidikanSMA">SMA</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pendidikan" value="S1"
                                        id="pendidikanS1" {{ old('pendidikan') == 'S1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pendidikanS1">S1</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pendidikan" value="S2"
                                        id="pendidikanS2" {{ old('pendidikan') == 'S2' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pendidikanS2">S2</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pendidikan" value="S3"
                                        id="pendidikanS3" {{ old('pendidikan') == 'S3' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pendidikanS3">S3</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label class="col-md-2 col-form-label">Pekerjaan <span class="text-danger">*</span></label>
                            <div class="col-md-10 d-flex align-items-center flex-wrap">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pekerjaan" value="PNS"
                                        id="pekerjaanPNS" {{ old('pekerjaan') == 'PNS' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pekerjaanPNS">PNS</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pekerjaan" value="TNI"
                                        id="pekerjaanTNI" {{ old('pekerjaan') == 'TNI' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pekerjaanTNI">TNI</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pekerjaan" value="POLRI"
                                        id="pekerjaanPOLRI" {{ old('pekerjaan') == 'POLRI' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pekerjaanPOLRI">POLRI</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pekerjaan" value="SWASTA"
                                        id="pekerjaanSwasta" {{ old('pekerjaan') == 'SWASTA' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pekerjaanSwasta">SWASTA</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="pekerjaan" value="WIRAUSAHA"
                                        id="pekerjaanWirausaha" {{ old('pekerjaan') == 'WIRAUSAHA' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pekerjaanWirausaha">WIRAUSAHA</label>
                                </div>
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="pekerjaan" value="LAINNYA"
                                        id="pekerjaanLainnya" {{ old('pekerjaan') == 'LAINNYA' || (!in_array(old('pekerjaan'), ['PNS', 'TNI', 'POLRI', 'SWASTA', 'WIRAUSAHA']) && old('pekerjaan_lainnya')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pekerjaanLainnya">LAINNYA...</label>
                                </div>
                                {{-- The input field we want to hide/show --}}
                                <div class="col-2" id="pekerjaanLainnyaInputContainer" style="display: none;">
                                    <input type="text" class="form-control form-control-sm" placeholder="(sebutkan)"
                                        id="pekerjaanLainnyaText" name="pekerjaan_lainnya" value="{{ old('pekerjaan_lainnya') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <label for="jenisLayanan" class="col-md-2 col-form-label">Jenis Layanan yang diterima <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control form-control-sm" id="jenisLayanan"
                                    placeholder="(misal: KTP, Akta, Sertifikat, Poli Umum, dll)" name="layanan"
                                    value="{{ old('layanan') }}">
                            </div>
                        </div>

                        <hr>

                        <h4 class="text-center">II. PENDAPAT RESPONDEN TENTANG PELAYANAN</h4>
                        <p class="text-center">(Pilih kode huruf sesuai jawaban masyarakat/responden)</p>

                        {{-- Pertanyaan P1 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">1. Bagaimana pendapat saudara tentang kesesuaian
                                persyaratan pelayanan dengan jenis pelayanannya. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey1" id="p1a"
                                    value="1" {{ old('survey1') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p1a">Tidak sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey1" id="p1b"
                                    value="2" {{ old('survey1') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p1b">Kurang sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey1" id="p1c"
                                    value="3" {{ old('survey1') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p1c">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey1" id="p1d"
                                    value="4" {{ old('survey1') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p1d">Sangat sesuai</label>
                            </div>
                        </div>

                        {{-- Pertanyaan P2 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">2. Bagaimana pemahaman saudara tentang kemudahan prosedur
                                pelayanan di unit ini. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey2" id="p2a"
                                    value="1" {{ old('survey2') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p2a">Tidak mudah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey2" id="p2b"
                                    value="2" {{ old('survey2') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p2b">Kurang mudah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey2" id="p2c"
                                    value="3" {{ old('survey2') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p2c">Mudah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey2" id="p2d"
                                    value="4" {{ old('survey2') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p2d">Sangat mudah</label>
                            </div>
                        </div>

                        {{-- Pertanyaan P3 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">3. Bagaimana pendapat saudara tentang kecepatan waktu
                                dalam memberikan pelayanan. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey3" id="p3a"
                                    value="1" {{ old('survey3') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p3a">Tidak cepat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey3" id="p3b"
                                    value="2" {{ old('survey3') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p3b">Kurang cepat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey3" id="p3c"
                                    value="3" {{ old('survey3') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p3c">Cepat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey3" id="p3d"
                                    value="4" {{ old('survey3') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p3d">Sangat cepat</label>
                            </div>
                        </div>

                        {{-- Pertanyaan P4 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">4. Bagaimana pendapat saudara tentang kewajaran
                                biaya/tarif dalam pelayanan. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey4" id="p4a"
                                    value="1" {{ old('survey4') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p4a">Sangat mahal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey4" id="p4b"
                                    value="2" {{ old('survey4') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p4b">Cukup mahal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey4" id="p4c"
                                    value="3" {{ old('survey4') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p4c">Murah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey4" id="p4d"
                                    value="4" {{ old('survey4') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p4d">Gratis</label>
                            </div>
                        </div>

                        {{-- Pertanyaan P5 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">5. Bagaimana pendapat saudara tentang kesesuaian produk
                                pelayanan anatar yang tercantum dalam standar pelayanan dengan hasil yang
                                diberikan. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey5" id="p5a"
                                    value="1" {{ old('survey5') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p5a">Tidak sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey5" id="p5b"
                                    value="2" {{ old('survey5') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p5b">Kurang sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey5" id="p5c"
                                    value="3" {{ old('survey5') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p5c">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey5" id="p5d"
                                    value="4" {{ old('survey5') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p5d">Sangat sesuai</label>
                            </div>
                        </div>

                        {{-- Pertanyaan P6 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">6. Bagaimana pendapat saudara tentang
                                kompetensi/kemampuan petugas dalam pelayanan. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey6" id="p6a"
                                    value="1" {{ old('survey6') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p6a">Tidak kompeten</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey6" id="p6b"
                                    value="2" {{ old('survey6') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p6b">Kurang kompeten</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey6" id="p6c"
                                    value="3" {{ old('survey6') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p6c">Kompeten</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey6" id="p6d"
                                    value="4" {{ old('survey6') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p6d">Sangat kompeten</label>
                            </div>
                        </div>

                        {{-- Pertanyaan P7 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">7. Bagaimana pendapat saudara perilaku petugas dalam
                                pelayanan terkait kesopanan dan keramahan. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey7" id="p7a"
                                    value="1" {{ old('survey7') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p7a">Tidak sopan dan ramah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey7" id="p7b"
                                    value="2" {{ old('survey7') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p7b">Kurang sopan dan ramah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey7" id="p7c"
                                    value="3" {{ old('survey7') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p7c">Sopan dan ramah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey7" id="p7d"
                                    value="4" {{ old('survey7') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p7d">Sangat sopan dan ramah</label>
                            </div>
                        </div>

                        {{-- Pertanyaan P8 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">8. Bagaimana pendapat saudara tentang kualitas sarana dan
                                prasarana. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey8" id="p8a"
                                    value="1" {{ old('survey8') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p8a">Buruk</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey8" id="p8b"
                                    value="2" {{ old('survey8') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p8b">Cukup</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey8" id="p8c"
                                    value="3" {{ old('survey8') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p8c">Baik</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey8" id="p8d"
                                    value="4" {{ old('survey8') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p8d">Sangat baik</label>
                            </div>
                        </div>

                        {{-- Pertanyaan P9 --}}
                        <div class="question-group mb-5">
                            <label class="form-label d-block">9. Bagaimana pendapat saudara tentang penanganan
                                pengaduan pengguna layanan. <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey9" id="p9a"
                                    value="1" {{ old('survey9') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p9a">Tidak ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey9" id="p9b"
                                    value="2" {{ old('survey9') == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p9b">Ada tetapi tidak berfungsi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey9" id="p9c"
                                    value="3" {{ old('survey9') == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p9c">Berfungsi kurang maksimal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="survey9" id="p9d"
                                    value="4" {{ old('survey9') == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="p9d">Dikelola dengan baik</label>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn-e-survey">
                                <span>Kirim Survei</span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pekerjaanRadios = document.querySelectorAll('input[name="pekerjaan"]');
            const pekerjaanLainnyaInputContainer = document.getElementById('pekerjaanLainnyaInputContainer');
            const pekerjaanLainnyaTextInput = document.getElementById('pekerjaanLainnyaText');
            const pekerjaanLainnyaRadio = document.getElementById('pekerjaanLainnya');

            function togglePekerjaanLainnyaInput() {
                if (pekerjaanLainnyaRadio && pekerjaanLainnyaInputContainer && pekerjaanLainnyaTextInput) {
                    if (pekerjaanLainnyaRadio.checked) {
                        pekerjaanLainnyaInputContainer.style.display = 'block';
                        pekerjaanLainnyaTextInput.setAttribute('required', 'required');
                    } else {
                        pekerjaanLainnyaInputContainer.style.display = 'none';
                        pekerjaanLainnyaTextInput.value = '';
                        pekerjaanLainnyaTextInput.removeAttribute('required');
                    }
                }
            }

            pekerjaanRadios.forEach(radio => {
                radio.addEventListener('change', togglePekerjaanLainnyaInput);
            });

            // Panggil fungsi ini saat halaman dimuat untuk mengatur status awal
            // Ini akan memastikan input "Lainnya" terlihat jika sebelumnya dipilih dan ada old() value
            togglePekerjaanLainnyaInput();
        });
    </script>
@endpush