@extends('layout.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>

        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    {{-- <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Pengajuan <i
                            class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $all }}</h2>
                    <h6 class="card-text">Keseluruhan</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Pengajuan APPROVED <i
                            class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $approved }}</h2>
                    <h6 class="card-text">Approved</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Rejected Pengajuan <i
                            class="mdi mdi-bookmark-outline  mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $rejected }}</h2>
                    <h6 class="card-text">Rejected</h6>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
                        <div class="col-md-7 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                                        <div id="visit-sale-chart-legend"
                                            class="rounded-legend legend-horizontal legend-top-right float-right">
                                        </div>
                                    </div>
                                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Traffic Sources</h4>
                                    <canvas id="traffic-chart"></canvas>
                                    <div id="traffic-chart-legend"
                                        class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
    @if (auth()->user()->akses_user == 'master')
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar User</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> username </th>
                                        <th> akses user </th>
                                        <th> Email </th>
                                        <th> Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $usr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ $usr->username }} </td>
                                            <td>
                                                <label class="badge badge-gradient-success">{{ $usr->akses_user }}</label>
                                            </td>
                                            <td>{{ $usr->email }}</td>
                                            <td> <a href="{{ url('/reset-password/' . $usr->id) }}"
                                                    class="btn btn-info btn-sm"> Reset Password</a>
                                                <a href="{{ url('delete-user/' . $usr->id) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="javascript:return confirm('yakin ingin menghapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
