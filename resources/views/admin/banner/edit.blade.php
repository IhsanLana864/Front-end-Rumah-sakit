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
                <h5 class="m-b-10">Banner</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner</a></li>
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
                    {{-- Form action untuk UPDATE --}}
                    <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Banner</label>
                                <input type="file" class="form-control mb-2" id="gambar_banner_input" name="gambar" accept="image/*">
                                @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah banner. Maksimal 2MB, format JPG, PNG, GIF</small>

                                {{-- Tempat untuk preview gambar --}}
                                <div class="mt-3" id="gambar_banner_preview_container" style="display: none;">
                                    <p>Preview Gambar:</p>
                                    <img id="gambar_banner_preview" src="#" alt="Preview Gambar" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>

                                {{-- Tampilkan gambar yang sudah ada jika ada --}}
                                @if ($banner->gambar)
                                    <div class="mt-3" id="current_gambar_container">
                                        <p>Gambar Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $banner->gambar) }}" alt="Banner Saat Ini" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control mb-2" name="keterangan" value="{{ old('keterangan', $banner->keterangan) }}" placeholder="Keterangan banner">
                                @error('keterangan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
        const gambarInput = $('#gambar_banner_input');
        const gambarPreview = $('#gambar_banner_preview');
        const previewContainer = $('#gambar_banner_preview_container');
        const currentGambarContainer = $('#current_gambar_container'); // Untuk gambar lama

        // Fungsi untuk menampilkan preview gambar
        function showImagePreview(src) {
            gambarPreview.attr('src', src);
            previewContainer.show();
            currentGambarContainer.hide(); // Sembunyikan gambar lama jika ada preview baru
        }

        // Fungsi untuk menyembunyikan preview
        function hideImagePreview() {
            gambarPreview.attr('src', '#');
            previewContainer.hide();
            currentGambarContainer.show(); // Tampilkan kembali gambar lama jika preview baru dihapus
        }

        // 1. Tampilkan gambar yang sudah ada saat halaman dimuat (jika ada)
        @if ($banner->gambar)
            // Prioritaskan old() jika ada error validasi
            var initialGambarSrc = "{{ old('gambar') ? asset('storage/' . old('gambar')) : asset('storage/' . $banner->gambar) }}";
            showImagePreview(initialGambarSrc);
            currentGambarContainer.show(); // Pastikan container gambar lama terlihat jika ada
        @else
            hideImagePreview(); // Pastikan preview tersembunyi jika tidak ada gambar
        @endif

        // 2. Tambahkan event listener untuk perubahan pada input file (untuk upload gambar baru)
        gambarInput.on('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        showImagePreview(e.target.result); // Tampilkan preview gambar baru
                    };

                    reader.readAsDataURL(file);
                } else {
                    hideImagePreview(); // Sembunyikan preview jika bukan gambar
                    alert('File yang dipilih bukan gambar. Mohon pilih file gambar (JPG, PNG, GIF).');
                    gambarInput.val(''); // Kosongkan input file
                }
            } else {
                hideImagePreview(); // Sembunyikan preview jika input file kosong
            }
        });
    });
</script>
@endpush