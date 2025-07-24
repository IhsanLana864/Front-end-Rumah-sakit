@extends('admin.layouts.main')

@section('content')
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">E-Survey</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.survey.index') }}">Home</a></li>
                <li class="breadcrumb-item">E-Survey</li>
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
                    <!-- <a href="{{ route('admin.survey.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>New Data</span>
                    </a> -->
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
                            <table class="table table-hover" id="SurveyTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pendidikan</th>
                                        <th>Pekerjaan</th>
                                        <th>Layanan</th>
                                        <th>Pertanyaan 1</th>
                                        <th>Pertanyaan 2</th>
                                        <th>Pertanyaan 3</th>
                                        <th>Pertanyaan 4</th>
                                        <th>Pertanyaan 5</th>
                                        <th>Pertanyaan 6</th>
                                        <th>Pertanyaan 7</th>
                                        <th>Pertanyaan 8</th>
                                        <th>Pertanyaan 9</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($surveys as $survey)
                                        <tr class="single-item">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $survey->jenis_kelamin }}</td>
                                            <td>{{ $survey->pendidikan }}</td>
                                            <td>{{ $survey->pekerjaan }}</td>
                                            <td>{{ $survey->layanan }}</td>
                                            <td>{{ $survey->survey1 }}</td>
                                            <td>{{ $survey->survey2 }}</td>
                                            <td>{{ $survey->survey3 }}</td>
                                            <td>{{ $survey->survey4 }}</td>
                                            <td>{{ $survey->survey5 }}</td>
                                            <td>{{ $survey->survey6 }}</td>
                                            <td>{{ $survey->survey7 }}</td>
                                            <td>{{ $survey->survey8 }}</td>
                                            <td>{{ $survey->survey9 }}</td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <form action="{{ route('admin.survey.destroy', $survey->id) }}" method="POST" class="d-inline">
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