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
                    <form action="{{ route('admin.company.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                        <div class="row">

                            <div class="col-12 mb-4">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="nama" required placeholder="Nama company">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control mb-2" id="logo_company_input" name="logo" required>
                                @error('logo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 2MB, format JPG, PNG, GIF</small>

                                {{-- Tempat untuk preview gambar --}}
                                <div class="mt-3" id="logo_company_preview_container" style="display: none;">
                                    <p>Preview Gambar:</p>
                                    <img id="logo_company_preview" src="#" alt="Preview Logo" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" name="alamat" required placeholder="Alamat"></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Long <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="long" required placeholder="long">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Lat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="lat" required placeholder="lat">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Falsafah <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" name="falsafah" required placeholder="Falsafah"></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Visi <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" name="visi" required placeholder="Visi"></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Misi <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" name="misi" required placeholder="Misi"></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Motto <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" name="motto" required placeholder="Motto"></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Budaya Kerja <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" name="budaya_kerja" required placeholder="Budaya Kerja"></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Internal <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" name="internal" required placeholder="Internal"></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Eksternal <span class="text-danger">*</span></label>
                                <textarea type="text" class="form-control mb-2" name="eksternal" required placeholder="Eksternal"></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Kontak <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="kontak" required placeholder="kontak">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="email" required placeholder="email">
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
        const gambarInput = $('#logo_company_input');
        const gambarPreview = $('#logo_company_preview');
        const previewContainer = $('#logo_company_preview_container');

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