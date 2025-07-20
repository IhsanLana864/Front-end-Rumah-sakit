@extends('admin.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Company</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.company.index') }}">Home</a></li>
                <li class="breadcrumb-item">Profile</li>
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
                    <a href="{{ route('admin.company.create') }}" class="btn btn-primary">
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
                            <table class="table table-hover" id="companyTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Logo</th>
                                        <th>Alamat</th>
                                        <th>Long</th>
                                        <th>Lat</th>
                                        <th>falsafah</th>
                                        <th>Visi</th>
                                        <th>Misi</th>
                                        <th>Motto</th>
                                        <th>Budaya Kerja</th>
                                        <th>Internal</th>
                                        <th>Eksternal</th>
                                        <th>Kontak</th>
                                        <th>Email</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($companies as $company)
                                        <tr class="single-item">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->nama }}</td>
                                            <td><img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50" height="50" style="border-radius: 10px;">
                                            </td>
                                            <td>{{ $company->alamat }}</td>
                                            <td>{{ $company->long }}</td>
                                            <td>{{ $company->lat }}</td>
                                            <td>{{ $company->falsafah }}</td>
                                            <td>{{ $company->visi }}</td>
                                            <td>{{ $company->misi }}</td>
                                            <td>{{ $company->motto }}</td>
                                            <td>{{ $company->budaya_kerja }}</td>
                                            <td>{{ $company->internal }}</td>
                                            <td>{{ $company->eksternal }}</td>
                                            <td>{{ $company->kontak }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ route('admin.company.edit', $company->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather feather-edit-3"></i>
                                                    </a>
                                                    <form action="{{ route('admin.company.destroy', $company->id) }}" method="POST" class="d-inline">
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
                                            <td colspan="15" class="text-center">Tidak ada data.</td>
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