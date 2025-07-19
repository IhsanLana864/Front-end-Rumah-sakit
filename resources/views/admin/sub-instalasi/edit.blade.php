@extends('admin.layouts.main')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Sub Instalasi</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.sub-instalasi.index') }}">Sub Instalasi</a></li>
                <li class="breadcrumb-item">Edit</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <form action="{{ route('admin.sub-instalasi.update', $subInstalasi->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Instalasi Induk <span class="text-danger">*</span></label>
                                <select class="form-control mb-2" name="instalasi_id" required>
                                    <option value="">Pilih Instalasi</option>
                                    @foreach($instalasis as $instalasi)
                                        <option value="{{ $instalasi->id }}" {{ old('instalasi_id', $subInstalasi->instalasi_id) == $instalasi->id ? 'selected' : '' }}>
                                            {{ $instalasi->nama_instalasi }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('instalasi_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Sub Instalasi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="nama_sub" value="{{ old('nama_sub', $subInstalasi->nama_sub) }}" required placeholder="Nama Sub Instalasi">
                                @error('nama_sub')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="keterangan" value="{{ old('keterangan', $subInstalasi->keterangan) }}" required placeholder="Keterangan">
                                @error('keterangan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control mb-2" id="logo_instalasi_input" name="logo">
                                @error('logo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 2MB, format JPG, PNG, GIF. Biarkan kosong jika tidak ingin mengubah.</small>

                                {{-- Tempat untuk preview gambar --}}
                                <div class="mt-3" id="logo_instalasi_preview_container" style="{{ $subInstalasi->logo ? 'display: block;' : 'display: none;' }}">
                                    <p>Preview Gambar:</p>
                                    {{-- Menampilkan logo lama jika ada --}}
                                    <img id="logo_instalasi_preview" src="{{ $subInstalasi->logo ? asset('storage/' . $subInstalasi->logo) : '#' }}" alt="Preview Logo" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button class="btn btn-primary" type="submit">
                                <i class="feather-save me-2"></i>
                                <span>Update</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Ambil elemen input file dan preview gambar
        const gambarInput = $('#logo_instalasi_input');
        const gambarPreview = $('#logo_instalasi_preview');
        const previewContainer = $('#logo_instalasi_preview_container');

        // Fungsi untuk menampilkan preview
        function showImagePreview(src) {
            gambarPreview.attr('src', src);
            previewContainer.show();
        }

        // Cek apakah ada logo lama saat halaman dimuat
        const initialLogoSrc = gambarPreview.attr('src');
        if (initialLogoSrc && initialLogoSrc !== '#') {
            previewContainer.show();
        }

        // Tambahkan event listener untuk perubahan pada input file
        gambarInput.on('change', function(event) {
            const file = event.target.files[0]; // Ambil file pertama yang dipilih

            if (file) {
                // Pastikan file adalah gambar
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader(); // Buat objek FileReader

                    reader.onload = function(e) {
                        // Saat file selesai dibaca, atur src gambar preview
                        showImagePreview(e.target.result);
                    };

                    reader.readAsDataURL(file); // Baca file sebagai URL data (Base64)
                } else {
                    // Jika bukan gambar, reset input dan sembunyikan preview, tampilkan alert
                    gambarPreview.attr('src', '#'); // Reset src preview
                    previewContainer.hide(); // Sembunyikan container preview
                    alert('File yang dipilih bukan gambar. Mohon pilih file gambar (JPG, PNG, GIF).');
                    gambarInput.val(''); // Kosongkan input file untuk mencegah pengiriman file yang salah
                }
            } else {
                // Jika tidak ada file baru yang dipilih, kembali ke logo lama jika ada
                if (initialLogoSrc && initialLogoSrc !== '#') {
                    showImagePreview(initialLogoSrc);
                } else {
                    gambarPreview.attr('src', '#');
                    previewContainer.hide();
                }
            }
        });
    });
</script>
@endpush