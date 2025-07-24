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
                <h5 class="m-b-10">Tentang Kami</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.tentang-kami.index') }}">Home</a></li>
                <li class="breadcrumb-item">Edit</li> {{-- Ubah dari Create ke Edit --}}
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
                    <form action="{{ route('admin.tentang-kami.update', $tentang_kami->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT') {{-- PENTING untuk operasi UPDATE --}}

                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Foto Atas (Gambar 1)</label>
                                <input type="file" class="form-control mb-2" id="gambar1_input" name="gambar1" accept="image/jpeg,image/png,image/gif">
                                @error('gambar1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar ini. Maksimal 2MB, format JPG, PNG, GIF</small>
                                {{-- Preview untuk gambar baru yang diupload --}}
                                <div class="mt-3 gambar-preview-container" id="gambar1_preview_container" style="display: none;">
                                    <p>Preview Gambar 1:</p>
                                    <img id="gambar1_preview" src="#" alt="Preview Foto 1" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                                {{-- Tampilan gambar yang sudah ada --}}
                                @if ($tentang_kami->gambar1)
                                    <div class="mt-3 current-gambar-container" id="current_gambar1_container">
                                        <p>Gambar 1 Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $tentang_kami->gambar1) }}" alt="Foto Atas Saat Ini" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                    </div>
                                @endif
                            </div>

                            {{-- Input dan Preview untuk Gambar 2 --}}
                            <div class="col-12 mb-4">
                                <label class="form-label">Foto Kiri (Gambar 2)</label>
                                <input type="file" class="form-control mb-2" id="gambar2_input" name="gambar2" accept="image/jpeg,image/png,image/gif">
                                @error('gambar2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar ini. Maksimal 2MB, format JPG, PNG, GIF</small>
                                <div class="mt-3 gambar-preview-container" id="gambar2_preview_container" style="display: none;">
                                    <p>Preview Gambar 2:</p>
                                    <img id="gambar2_preview" src="#" alt="Preview Foto 2" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                                @if ($tentang_kami->gambar2)
                                    <div class="mt-3 current-gambar-container" id="current_gambar2_container">
                                        <p>Gambar 2 Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $tentang_kami->gambar2) }}" alt="Foto Kiri Saat Ini" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                    </div>
                                @endif
                            </div>

                            {{-- Input dan Preview untuk Gambar 3 --}}
                            <div class="col-12 mb-4">
                                <label class="form-label">Foto Kanan (Gambar 3)</label>
                                <input type="file" class="form-control mb-2" id="gambar3_input" name="gambar3" accept="image/jpeg,image/png,image/gif">
                                @error('gambar3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar ini. Maksimal 2MB, format JPG, PNG, GIF</small>
                                <div class="mt-3 gambar-preview-container" id="gambar3_preview_container" style="display: none;">
                                    <p>Preview Gambar 3:</p>
                                    <img id="gambar3_preview" src="#" alt="Preview Foto 3" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                                @if ($tentang_kami->gambar3)
                                    <div class="mt-3 current-gambar-container" id="current_gambar3_container">
                                        <p>Gambar 3 Saat Ini:</p>
                                        <img src="{{ asset('storage/' . $tentang_kami->gambar3) }}" alt="Foto Kanan Saat Ini" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                    </div>
                                @endif
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
            function setupImagePreview(inputElementId, previewImageId, previewContainerId, currentGambarContainerId, currentGambarPath) {
                const gambarInput = $('#' + inputElementId);
                const gambarPreview = $('#' + previewImageId);
                const previewContainer = $('#' + previewContainerId);
                const currentGambarContainer = $('#' + currentGambarContainerId);

                // Fungsi untuk menampilkan preview baru
                function showNewImagePreview(src) {
                    gambarPreview.attr('src', src);
                    previewContainer.show();
                    currentGambarContainer.hide(); // Sembunyikan gambar lama
                }

                // Fungsi untuk menyembunyikan preview baru dan mungkin menampilkan kembali yang lama
                function hideNewImagePreview() {
                    gambarPreview.attr('src', '#');
                    previewContainer.hide();
                    if (currentGambarPath) { // Jika ada gambar lama, tampilkan lagi
                        currentGambarContainer.show();
                    } else { // Jika tidak ada gambar lama, pastikan container lama juga tersembunyi
                        currentGambarContainer.hide();
                    }
                }

                const oldInputPath = gambarInput.data('old-value'); // Ambil old value dari data attribute
                if (oldInputPath) {
                    // Jika ada old input (setelah validasi gagal), gunakan itu untuk preview
                    showNewImagePreview(oldInputPath);
                } else if (currentGambarPath) {
                    hideNewImagePreview(); // Pastikan preview kontainer baru tersembunyi
                } else {
                    // Jika tidak ada old input dan tidak ada gambar DB, sembunyikan semua
                    hideNewImagePreview();
                }


                gambarInput.on('change', function(event) {
                    const file = event.target.files.length > 0 ? event.target.files[0] : null;

                    if (file) {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                showNewImagePreview(e.target.result);
                            };
                            reader.readAsDataURL(file);
                        } else {
                            hideNewImagePreview();
                            alert('File yang dipilih bukan gambar. Mohon pilih file gambar (JPG, PNG, GIF).');
                            gambarInput.val(''); // Kosongkan input file
                        }
                    } else {
                        hideNewImagePreview();
                    }
                });
            }

            setupImagePreview('gambar1_input', 'gambar1_preview', 'gambar1_preview_container', 'current_gambar1_container', "{{ $tentang_kami->gambar1 ? asset('storage/' . $tentang_kami->gambar1) : '' }}");
            setupImagePreview('gambar2_input', 'gambar2_preview', 'gambar2_preview_container', 'current_gambar2_container', "{{ $tentang_kami->gambar2 ? asset('storage/' . $tentang_kami->gambar2) : '' }}");
            setupImagePreview('gambar3_input', 'gambar3_preview', 'gambar3_preview_container', 'current_gambar3_container', "{{ $tentang_kami->gambar3 ? asset('storage/' . $tentang_kami->gambar3) : '' }}");
        });
    </script>
@endpush