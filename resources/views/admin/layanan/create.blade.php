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
                <h5 class="m-b-10">Layanan</h5>
            </div>
            <ul class="breadcrumb">
                {{-- Pastikan ini mengarah ke beranda admin yang benar --}}
                <li class="breadcrumb-item"><a href="{{ route('admin.layanan.index') }}">Home</a></li>
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
    <div class="main-content">
        <div class="row">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <form action="{{ route('admin.layanan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Pelayanan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" name="pelayanan" value="{{ old('pelayanan') }}" required placeholder="Pelayanan">
                                @error('pelayanan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Hari <span class="text-danger">*</span></label>
                                <div class="form-group d-flex flex-wrap gap-3">
                                    @php
                                        $allDays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                        $selectedDays = old('hari_checkboxes', []);
                                    @endphp
                                    @foreach ($allDays as $day)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input hari-checkbox" type="checkbox"
                                                id="hari-{{ strtolower($day) }}"
                                                name="hari_checkboxes[]"
                                                value="{{ $day }}"
                                                {{ in_array($day, $selectedDays) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="hari-{{ strtolower($day) }}">{{ $day }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="text" class="form-control mb-2" id="FinalHari" name="hari" value="{{ old('hari') }}">
                                @error('hari')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Jam Pendaftaran Awal</label>
                                <input type="time" class="form-control mb-2" name="jam_pendaftaran_awal" value="{{ old('jam_pendaftaran_awal') }}">
                                @error('jam_pendaftaran_awal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Jam Pendaftaran Akhir</label>
                                <input type="time" class="form-control mb-2" name="jam_pendaftaran_akhir" value="{{ old('jam_pendaftaran_akhir') }}">
                                @error('jam_pendaftaran_akhir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Jam Praktek Awal</label>
                                <input type="time" class="form-control mb-2" name="jam_praktek_awal" value="{{ old('jam_praktek_awal') }}">
                                @error('jam_praktek_awal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Jam Praktek Akhir</label>
                                <input type="time" class="form-control mb-2" name="jam_praktek_akhir" value="{{ old('jam_praktek_akhir') }}">
                                @error('jam_praktek_akhir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
        // Fungsi untuk memperbarui input FinalHari
        function updateFinalHari() {
            var selectedDays = [];
            // Iterasi setiap checkbox dengan kelas 'hari-checkbox' yang dicentang
            $('.hari-checkbox:checked').each(function() {
                selectedDays.push($(this).val()); // Ambil nilai (nama hari)
            });

            // Handle khusus untuk 'SENIN - JUMAT' jika semua hari kerja dipilih
            const weekdays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
            const allWeekdaysSelected = weekdays.every(day => selectedDays.includes(day));

            if (allWeekdaysSelected && selectedDays.length === weekdays.length) {
                $('#FinalHari').val('SENIN - JUMAT');
            } else {
                // Gabungkan array menjadi string dengan koma dan spasi
                $('#FinalHari').val(selectedDays.join(', '));
            }
        }

        // Panggil fungsi saat halaman dimuat (untuk kasus edit atau reload karena error validasi)
        updateFinalHari();

        // Panggil fungsi setiap kali checkbox berubah
        $('.hari-checkbox').on('change', function() {
            updateFinalHari();
        });

        // Bagian ini penting untuk kasus old() value saat validasi gagal
        // Jika ada old('hari'), kita harus memecahnya dan mencentang kembali checkbox
        @if(old('hari'))
            var oldHari = "{{ old('hari') }}";
            var oldSelectedDaysArray = [];
            if (oldHari === 'SENIN - JUMAT') {
                oldSelectedDaysArray = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
            } else {
                oldSelectedDaysArray = oldHari.split(', ').map(day => day.trim());
            }

            $('.hari-checkbox').each(function() {
                if (oldSelectedDaysArray.includes($(this).val())) {
                    $(this).prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
            });
            updateFinalHari(); // Panggil lagi untuk memastikan FinalHari terupdate
        @endif
    });
</script>
@endpush