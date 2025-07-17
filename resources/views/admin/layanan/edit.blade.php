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
                {{-- Kembali ke index Layanan --}}
                <li class="breadcrumb-item"><a href="{{ route('admin.layanan.index') }}">Layanan</a></li>
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
                    {{-- FORM ACTION UNTUK UPDATE --}}
                    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- PENTING: Untuk HTTP PUT/PATCH method --}}

                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label">Pelayanan <span class="text-danger">*</span></label>
                                {{-- Menggunakan old() untuk error validasi, fallback ke data $layanan --}}
                                <input type="text" class="form-control mb-2" name="pelayanan"
                                    value="{{ old('pelayanan', $layanan->pelayanan) }}" required placeholder="Pelayanan">
                                @error('pelayanan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Hari <span class="text-danger">*</span></label>
                                <div class="form-group d-flex flex-wrap gap-3">
                                    @php
                                        $allDays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

                                        // LOGIKA UNTUK MENENTUKAN HARI YANG SUDAH DIPILIH
                                        $preselectedDays = [];
                                        if ($layanan->hari) {
                                            // Handle "SENIN - JUMAT" special case when loading from DB
                                            if ($layanan->hari === 'SENIN - JUMAT') {
                                                $preselectedDays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                                            } else {
                                                $preselectedDays = explode(', ', $layanan->hari);
                                            }
                                        }
                                        // Prioritaskan old() values jika validasi gagal
                                        $selectedDaysForCheckboxes = old('hari_checkboxes', $preselectedDays);
                                    @endphp
                                    @foreach ($allDays as $day)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input hari-checkbox" type="checkbox"
                                                id="hari-{{ strtolower($day) }}"
                                                name="hari_checkboxes[]"
                                                value="{{ $day }}"
                                                {{ in_array($day, $selectedDaysForCheckboxes) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="hari-{{ strtolower($day) }}">{{ $day }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- INPUT HIDDEN UNTUK MENYIMPAN HASIL GABUNGAN HARI --}}
                                {{-- Value diisi dari old() atau dari data $layanan --}}
                                <input type="hidden" class="form-control mb-2" id="FinalHari" name="hari" value="{{ old('hari', $layanan->hari) }}">
                                @error('hari')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Jam Pendaftaran Awal</label>
                                <input type="time" class="form-control mb-2" name="jam_pendaftaran_awal"
                                    value="{{ old('jam_pendaftaran_awal', $layanan->jam_pendaftaran_awal ? \Carbon\Carbon::parse($layanan->jam_pendaftaran_awal)->format('H:i') : '') }}">
                                @error('jam_pendaftaran_awal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Jam Pendaftaran Akhir</label>
                                <input type="time" class="form-control mb-2" name="jam_pendaftaran_akhir"
                                    value="{{ old('jam_pendaftaran_akhir', $layanan->jam_pendaftaran_akhir ? \Carbon\Carbon::parse($layanan->jam_pendaftaran_akhir)->format('H:i') : '') }}">
                                @error('jam_pendaftaran_akhir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Jam Praktek Awal</label>
                                <input type="time" class="form-control mb-2" name="jam_praktek_awal"
                                    value="{{ old('jam_praktek_awal', $layanan->jam_praktek_awal ? \Carbon\Carbon::parse($layanan->jam_praktek_awal)->format('H:i') : '') }}">
                                @error('jam_praktek_awal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Jam Praktek Akhir</label>
                                <input type="time" class="form-control mb-2" name="jam_praktek_akhir"
                                    value="{{ old('jam_praktek_akhir', $layanan->jam_praktek_akhir ? \Carbon\Carbon::parse($layanan->jam_praktek_akhir)->format('H:i') : '') }}">
                                @error('jam_praktek_akhir')
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
        // Fungsi untuk memperbarui input FinalHari
        function updateFinalHari() {
            var selectedDays = [];
            $('.hari-checkbox:checked').each(function() {
                selectedDays.push($(this).val());
            });

            const weekdays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
            const allWeekdaysSelected = weekdays.every(day => selectedDays.includes(day));

            if (allWeekdaysSelected && selectedDays.length === weekdays.length) {
                $('#FinalHari').val('SENIN - JUMAT');
            } else {
                $('#FinalHari').val(selectedDays.join(', '));
            }
        }

        updateFinalHari();

        // Panggil fungsi setiap kali checkbox berubah
        $('.hari-checkbox').on('change', function() {
            updateFinalHari();
        });
    });
</script>
@endpush