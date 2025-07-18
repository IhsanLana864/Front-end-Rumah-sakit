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
                <h5 class="m-b-10">Berita</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Home</a></li>
                <li class="breadcrumb-item">Edit</li> {{-- Diubah dari Create menjadi Edit --}}
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
                    {{-- Form action menunjuk ke route update dan menyertakan @method('PUT') --}}
                    <form action="{{ route('admin.berita.update', $berita->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT') {{-- Penting untuk metode PUT/PATCH --}}
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Gambar berita</label>
                                {{-- Hapus 'required' jika gambar bersifat opsional saat edit --}}
                                <input type="file" class="form-control mb-2" id="foto_berita_input" name="gambar">
                                @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 2MB, format JPG, PNG, GIF. Biarkan kosong jika tidak ingin mengubah gambar.</small>

                                {{-- Tempat untuk preview gambar --}}
                                <div class="mt-3" id="foto_berita_preview_container" style="{{ $berita->gambar ? 'display: block;' : 'display: none;' }}">
                                    <p>Preview Gambar:</p>
                                    {{-- Menampilkan gambar lama jika ada --}}
                                    <img id="foto_berita_preview" src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : '#' }}" alt="Preview Gambar" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Judul <span class="text-danger">*</span></label>
                                {{-- Menggunakan old() untuk data yang dikirim ulang (jika ada error) atau data dari $berita --}}
                                <input type="text" class="form-control mb-2" name="judul" required placeholder="Judul berita" value="{{ old('judul', $berita->judul) }}">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Detail <span class="text-danger">*</span></label>
                                {{-- Menggunakan old() dan $berita->detail untuk textarea --}}
                                <textarea class="form-control mb-2" style="height:400px" name="detail" required placeholder="Detail berita">{{ old('detail', $berita->detail) }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button class="btn btn-primary" type="submit">
                                <i class="feather-save me-2"></i>
                                <span>Update</span> {{-- Ubah dari Save menjadi Update --}}
                            </button>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-light">
                                <i class="feather-x me-2"></i>
                                <span>Cancel</span>
                            </a>
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
        const gambarInput = $('#foto_berita_input');
        const gambarPreview = $('#foto_berita_preview');
        const previewContainer = $('#foto_berita_preview_container');

        // Fungsi untuk menampilkan preview
        function showImagePreview(src) {
            gambarPreview.attr('src', src);
            previewContainer.show();
        }

        // Cek apakah ada gambar lama saat halaman dimuat
        const initialImageSrc = gambarPreview.attr('src');
        if (initialImageSrc && initialImageSrc !== '#') {
            previewContainer.show();
        }

        gambarInput.on('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        showImagePreview(e.target.result);
                    };

                    reader.readAsDataURL(file);
                } else {
                    gambarPreview.attr('src', '#'); // Reset src preview
                    previewContainer.hide(); // Sembunyikan container preview
                    alert('File yang dipilih bukan gambar. Mohon pilih file gambar (JPG, PNG, GIF).');
                    gambarInput.val(''); // Kosongkan input file
                }
            } else {
                // Jika tidak ada file baru yang dipilih, kembali ke gambar lama jika ada
                if (initialImageSrc && initialImageSrc !== '#') {
                    showImagePreview(initialImageSrc);
                } else {
                    gambarPreview.attr('src', '#');
                    previewContainer.hide();
                }
            }
        });
    });
</script>
@endpush