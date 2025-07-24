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
                <h5 class="m-b-10">Company</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.company.index') }}">Home</a></li>
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
                    <form action="{{ route('admin.company.update', $company->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-12 mb-4">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="nama" required placeholder="Nama perusahaan" value="{{ old('nama', $company->nama) }}">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control mb-2" id="logo_company_input" name="logo"> {{-- Hapus 'required' jika logo bersifat opsional saat edit --}}
                                @error('logo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 2MB, format JPG, PNG, GIF. Biarkan kosong jika tidak ingin mengubah.</small>

                                {{-- Tempat untuk preview gambar --}}
                                <div class="mt-3" id="logo_company_preview_container" style="{{ $company->logo ? 'display: block;' : 'display: none;' }}">
                                    <p>Preview Gambar:</p>
                                    {{-- Menampilkan logo lama jika ada --}}
                                    <img id="logo_company_preview" src="{{ $company->logo ? asset('storage/' . $company->logo) : '#' }}" alt="Preview Logo" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-2" name="alamat" rows="3" required placeholder="Alamat">{{ old('alamat', $company->alamat) }}</textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Long <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="long" required placeholder="Longitude" value="{{ old('long', $company->long) }}">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Lat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="lat" required placeholder="Latitude" value="{{ old('lat', $company->lat) }}">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Falsafah <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-2" name="falsafah" rows="3" required placeholder="Falsafah perusahaan">{{ old('falsafah', $company->falsafah) }}</textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Visi <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-2" name="visi" rows="3" required placeholder="Visi perusahaan">{{ old('visi', $company->visi) }}</textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Misi <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-2" name="misi" rows="3" required placeholder="Misi perusahaan">{{ old('misi', $company->misi) }}</textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Motto <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-2" name="motto" rows="3" required placeholder="Motto perusahaan">{{ old('motto', $company->motto) }}</textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Budaya Kerja <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-2" name="budaya_kerja" rows="3" required placeholder="Budaya Kerja perusahaan">{{ old('budaya_kerja', $company->budaya_kerja) }}</textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Eksternal <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-2" name="eksternal" rows="3" required placeholder="Kecamatan terjangkau">{{ old('eksternal', $company->eksternal) }}</textarea>
                                <small class="form-text text-muted">Gunakan format penulisan : kecamatan, kecamatan, kecamatan, dan kecamatan</small>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Kontak <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="kontak" required placeholder="Nomor Kontak / Telepon" value="{{ old('kontak', $company->kontak) }}">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control mb-2" name="email" required placeholder="Email perusahaan" value="{{ old('email', $company->email) }}"> {{-- Ubah type menjadi 'email' untuk validasi browser --}}
                            </div>

                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button class="btn btn-primary" type="submit">
                                <i class="feather-save me-2"></i>
                                <span>Update</span>
                            </button>
                            <a href="{{ route('admin.company.index') }}" class="btn btn-light">
                                <i class="feather-x me-2"></i>
                                <span>Cancel</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Ambil elemen input file dan preview gambar
        const gambarInput = $('#logo_company_input');
        const gambarPreview = $('#logo_company_preview');
        const previewContainer = $('#logo_company_preview_container');

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