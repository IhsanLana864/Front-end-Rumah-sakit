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
                <h5 class="m-b-10">Kegiatan</h5>
            </div>
            <ul class="breadcrumb">
                {{-- Mengarah ke index Kegiatan --}}
                <li class="breadcrumb-item"><a href="{{ route('admin.kegiatan.index') }}">Kegiatan</a></li>
                <li class="breadcrumb-item">Edit</li> {{-- Mengubah dari Create ke Edit --}}
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
                    <form action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- PENTING: Untuk HTTP PUT/PATCH method --}}

                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Gambar Kegiatan</label> {{-- Hapus tanda * karena tidak wajib di edit --}}
                                {{-- Hapus atribut 'required' untuk update, karena gambar bisa tidak diubah --}}
                                <input type="file" class="form-control mb-2" id="gambar_kegiatan_input" name="gambar" accept="image/*">
                                @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar. Maksimal 2MB, format JPG, PNG, GIF</small>

                                {{-- Tempat untuk preview gambar --}}
                                <div class="mt-3" id="gambar_kegiatan_preview_container" style="display: none;">
                                    <p>Preview Gambar:</p>
                                    <img id="gambar_kegiatan_preview" src="#" alt="Preview Gambar" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>

                                {{-- Tampilkan gambar yang sudah ada jika ada --}}
                                @if ($kegiatan->gambar)
                                    <div class="mt-3" id="current_gambar_container">
                                        <p>Gambar Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="Gambar Kegiatan Saat Ini" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Judul</label>
                                {{-- Menggunakan old() untuk error validasi, fallback ke data $kegiatan --}}
                                <input type="text" class="form-control mb-2" name="judul" value="{{ old('judul', $kegiatan->judul) }}" placeholder="Judul Gambar">
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 100 karakter</small>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Keterangan</label>
                                {{-- Menggunakan old() untuk error validasi, fallback ke data $kegiatan --}}
                                <input type="text" class="form-control mb-2" name="keterangan" value="{{ old('keterangan', $kegiatan->keterangan) }}" placeholder="Keterangan Gambar">
                                @error('keterangan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Maksimal 100 karakter</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <button class="btn btn-primary" type="submit">
                                <i class="feather-save me-2"></i>
                                <span>Update</span> {{-- Mengubah teks tombol --}}
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
        const gambarInput = $('#gambar_kegiatan_input');
        const gambarPreview = $('#gambar_kegiatan_preview');
        const previewContainer = $('#gambar_kegiatan_preview_container');
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
        @if ($kegiatan->gambar)
            // Prioritaskan old() jika ada error validasi
            var initialGambarSrc = "{{ old('gambar') ? asset('storage/' . old('gambar')) : asset('storage/' . $kegiatan->gambar) }}";
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