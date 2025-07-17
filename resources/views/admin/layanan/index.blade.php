@extends('admin.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Layanan</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.layanan.index') }}">Home</a></li>
                <li class="breadcrumb-item">Layanan</li>
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
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>New Data</span>
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
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="LayananTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelayanan</th>
                                        <th>Hari</th>
                                        <th>Jam Pendaftaran</th>
                                        <th>Jam Praktek</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($layanans as $layanan)
                                        <tr class="single-item">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $layanan->pelayanan }}</td>
                                            <td>{{ $layanan->hari }}</td>
                                            <td>
                                                @if ($layanan->jam_pendaftaran_awal && $layanan->jam_pendaftaran_akhir)
                                                    {{ \Carbon\Carbon::parse($layanan->jam_pendaftaran_awal)->format('H:i') }} -
                                                    {{ \Carbon\Carbon::parse($layanan->jam_pendaftaran_akhir)->format('H:i') }}
                                                @else
                                                    Kosong
                                                @endif
                                            </td>
                                            <td>
                                                @if ($layanan->jam_praktek_awal) {{-- Periksa apakah jam awal ada --}}
                                                    {{ \Carbon\Carbon::parse($layanan->jam_praktek_awal)->format('H:i') }} -
                                                    @if ($layanan->jam_praktek_akhir)
                                                        {{ \Carbon\Carbon::parse($layanan->jam_praktek_akhir)->format('H:i') }}
                                                    @else
                                                        Selesai
                                                    @endif
                                                @else
                                                    Kosong
                                                @endif
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather feather-edit-3"></i>
                                                    </a>
                                                    <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="avatar-text avatar-md" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            <i class="feather feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
@endsection