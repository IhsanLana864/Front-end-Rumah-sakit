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
                <h5 class="m-b-10">Internal</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.internal.index') }}">Home</a></li>
                <li class="breadcrumb-item">Create</li>
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
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <form action="{{ route('admin.internal.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Gambar <span class="text-danger">*</span></label>
                                <input type="file" class="form-control mb-2" id="foto_internal_input" name="gambar" required>
                                @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 2MB, format JPG, PNG, GIF</small>

                                {{-- Tempat untuk preview gambar --}}
                                <div class="mt-3" id="foto_internal_preview_container" style="display: none;">
                                    <p>Preview Gambar:</p>
                                    <img id="foto_internal_preview" src="#" alt="Preview Gambar" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Kepemilikan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="kepemilikan" required placeholder="Kepemilikan">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Kelas Rumah Sakit <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="kelas_rumah_sakit" required placeholder="Kelas rumah sakit">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Luas Tanah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="luas_tanah" required placeholder="Luas tanah">
                                <small class="form-text text-muted">Hanya input angka saja</small>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Luas Bangunan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="luas_bangunan" required placeholder="Luas bangunan">
                                <small class="form-text text-muted">Hanya input angka saja</small>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Deskripsi Fasilitas <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" style="height:400px" name="deskripsi_fasilitas" required placeholder="Deskripsi fasilitas"></textarea>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button class="btn btn-primary" type="submit">
                                <i class="feather-save me-2"></i>
                                <span>Save</span>
                            </button>
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
        const gambarInput = $('#foto_internal_input');
        const gambarPreview = $('#foto_internal_preview');
        const previewContainer = $('#foto_internal_preview_container');

        // Tambahkan event listener untuk perubahan pada input file
        gambarInput.on('change', function(event) {
            const file = event.target.files[0]; // Ambil file pertama yang dipilih

            if (file) {
                // Pastikan file adalah gambar
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader(); // Buat objek FileReader

                    reader.onload = function(e) {
                        // Saat file selesai dibaca, atur src gambar preview
                        gambarPreview.attr('src', e.target.result);
                        previewContainer.show(); // Tampilkan container preview
                    };

                    reader.readAsDataURL(file); // Baca file sebagai URL data (Base64)
                } else {
                    // Jika bukan gambar, reset input dan sembunyikan preview
                    gambarPreview.attr('src', '#');
                    previewContainer.hide();
                    alert('File yang dipilih bukan gambar. Mohon pilih file gambar (JPG, PNG, GIF).');
                    gambarInput.val(''); // Kosongkan input file
                }
            } else {
                // Jika tidak ada file yang dipilih, sembunyikan preview
                gambarPreview.attr('src', '#');
                previewContainer.hide();
            }
        });
    });
</script>
@endpush