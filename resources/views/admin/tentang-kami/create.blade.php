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
                <h5 class="m-b-10">Tentang Kami</h5> {{-- Judul halaman --}}
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.tentang-kami.index') }}">Home</a></li> {{-- Sesuaikan rute Home --}}
                <li class="breadcrumb-item">Create</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="d-flex d-md-none">
                <a href="javascript:void(0)" class="page-header-right-close-toggle">
                    <i class="feather-arrow-left me-2"></i>
                    <span>Back</span>
                </a>
            </div>
            {{-- Bagian tombol kanan (misal untuk kembali ke index) --}}
            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                <a href="{{ route('admin.tentang-kami.index') }}" class="btn btn-secondary">
                    <i class="feather-arrow-left me-2"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>
        <div class="d-md-none d-flex align-items-center">
            <a href="javascript:void(0)" class="page-header-right-open-toggle">
                <i class="feather-align-right fs-20"></i>
            </a>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    {{-- Pastikan enctype="multipart/form-data" untuk upload file --}}
                    <form action="{{ route('admin.tentang-kami.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            {{-- Input dan Preview untuk Gambar 1 --}}
                            <div class="col-12 mb-4">
                                <label class="form-label">Foto Atas (Gambar 1) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control mb-2" id="gambar1_input" name="gambar1" required accept="image/jpeg,image/png,image/gif">
                                @error('gambar1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 2MB, format JPG, PNG, GIF</small>
                                <div class="mt-3 gambar-preview-container" id="gambar1_preview_container" style="display: none;">
                                    <p>Preview Gambar 1:</p>
                                    <img id="gambar1_preview" src="#" alt="Preview Foto 1" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            </div>

                            {{-- Input dan Preview untuk Gambar 2 --}}
                            <div class="col-12 mb-4">
                                <label class="form-label">Foto Kiri (Gambar 2) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control mb-2" id="gambar2_input" name="gambar2" required accept="image/jpeg,image/png,image/gif">
                                @error('gambar2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 2MB, format JPG, PNG, GIF</small>
                                <div class="mt-3 gambar-preview-container" id="gambar2_preview_container" style="display: none;">
                                    <p>Preview Gambar 2:</p>
                                    <img id="gambar2_preview" src="#" alt="Preview Foto 2" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            </div>

                            {{-- Input dan Preview untuk Gambar 3 --}}
                            <div class="col-12 mb-4">
                                <label class="form-label">Foto Kanan (Gambar 3) <span class="text-danger">*</span></label>
                                <input type="file" class="form-control mb-2" id="gambar3_input" name="gambar3" required accept="image/jpeg,image/png,image/gif">
                                @error('gambar3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 2MB, format JPG, PNG, GIF</small>
                                <div class="mt-3 gambar-preview-container" id="gambar3_preview_container" style="display: none;">
                                    <p>Preview Gambar 3:</p>
                                    <img id="gambar3_preview" src="#" alt="Preview Foto 3" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
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
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Fungsi untuk mengatur preview gambar tunggal
        function setupImagePreview(inputElementId, previewImageId, previewContainerId) {
            const gambarInput = $('#' + inputElementId);
            const gambarPreview = $('#' + previewImageId);
            const previewContainer = $('#' + previewContainerId);

            gambarInput.on('change', function(event) {
                const file = event.target.files.length > 0 ? event.target.files[0] : null;

                if (file) {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            gambarPreview.attr('src', e.target.result);
                            previewContainer.show();
                        };

                        reader.readAsDataURL(file);
                    } else {
                        gambarPreview.attr('src', '#');
                        previewContainer.hide();
                        alert('File yang dipilih bukan gambar. Mohon pilih file gambar (JPG, PNG, GIF).');
                        gambarInput.val(''); // Kosongkan input file jika bukan gambar
                    }
                } else {
                    gambarPreview.attr('src', '#');
                    previewContainer.hide();
                }
            });
        }

        // Panggil fungsi setupImagePreview untuk setiap set input/preview
        setupImagePreview('gambar1_input', 'gambar1_preview', 'gambar1_preview_container');
        setupImagePreview('gambar2_input', 'gambar2_preview', 'gambar2_preview_container');
        setupImagePreview('gambar3_input', 'gambar3_preview', 'gambar3_preview_container');
    });
</script>
@endpush