@extends('layout.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="me-2 font-weight-semibold border-right pe-2 me-2">{{ $title }}</h5>
                <h5 class="font-weight-semibold">{{ $pengajuan->judul_pengajuan }}</h5>
            </div>
            <div class="row mx-sm-0">
                <div class="col-md-12 mb-5 pt-2 border px-0">
                    <div class="card rounded shadow-none">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-lg-5 d-lg-flex">
                                    <div class="user-avatar mb-auto">
                                        <img src="{{ Avatar::create($pengajuan->karyawans->nama)->toBase64() }}"
                                            alt="profile image" class="profile-img img-lg rounded-circle">
                                        {{-- <span class="edit-avatar-icon"><i class="mdi mdi-camera"></i></span> --}}
                                    </div>
                                    <div class="wrapper pl-lg-4">
                                        <div class="wrapper d-flex align-items-end ms-3">
                                            <h4 class="mb-0 font-weight-medium">{{ $pengajuan->karyawans->nama }}</h4>
                                            <div class="badge badge-secondary text-dark mt-2 ms-2">
                                                {{ auth()->user()->akses_user }}</div>
                                        </div>
                                        <div class="wrapper d-flex align-items-end font-weight-medium text-muted">

                                            <p class="mb-0 text-muted ms-3">{{ $pengajuan->karyawans->email }}</p>
                                        </div>
                                        <div class="wrapper d-flex align-items-start pt-3">
                                            {{-- <div class="badge badge-secondary text-dark me-2">
                                                <i class="mdi mdi-check-circle-outline icon-sm"></i>
                                            </div> --}}
                                            <div class="wrapper ps-2 d-none d-sm-block mx-2">
                                                <h6 class="mt-n1 mb-0 font-weight-medium">{{ $pengajuan->karyawans->no_hp }}
                                                </h6>
                                                <p class="text-muted">No HP</p>
                                            </div>
                                            {{-- <div class="badge badge-secondary text-dark me-2">
                                                <i class="mdi mdi-format-list-bulleted icon-sm"></i>
                                            </div> --}}
                                            <div class="wrapper ps-2 d-none d-sm-block">
                                                <h6 class="mt-n1 mb-0 font-weight-medium">{{ $pengajuan->karyawans->npk }}
                                                </h6>
                                                <p class="text-muted">NPK</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-5">
                                    <div class="d-flex align-items-center w-100">
                                        <p class="mb-0 me-3 font-weight-semibold">Status Pengajuan:</p>
                                        @switch($pengajuan->status_pengajuan)
                                            @case('PENDING')
                                                <div class="badge badge-warning text-dark">
                                                    {{ $pengajuan->status_pengajuan }}
                                                </div>
                                            @break

                                            @case('APPROVED')
                                                <div class="badge badge-success text-dark">
                                                    {{ $pengajuan->status_pengajuan }}
                                                </div>
                                            @break

                                            @case('REJECTED')
                                                <div class="badge badge-danger text-dark">
                                                    {{ $pengajuan->status_pengajuan }}
                                                </div>
                                            @break
                                        @endswitch


                                        {{-- <p class="mb-0 ms-3 font-weight-semibold">67%</p> --}}
                                    </div>
                                    <p class="text-muted mt-4">Kondisi Sebelum Perbaikan
                                        :&nbsp;{{ $pengajuan->kondisi_sebelum }}</p>
                                    <p class="text-muted mt-4">Kondisi Sesudah Perbaikan
                                        :&nbsp;{{ $pengajuan->kondisi_sesudah }}</p>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <div class="wrapper d-flex">
                                        @if (auth()->user()->akses_user == 'atasan')
                                            @if ($pengajuan->status_pengajuan == 'PENDING')
                                                <a href="{{ url('/approve-pengajuan/' . $pengajuan->id) }}"
                                                    class="btn btn-sm btn-info me-2">
                                                    <span class="mdi mdi-check menu-icon text-large"></span></a>
                                                <a href="{{ url('/reject-pengajuan/' . $pengajuan->id) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <span class="mdi mdi-close menu-icon text-large"></span></a>
                                            @elseif($pengajuan->status_pengajuan == 'REJECTED')
                                                <a href="{{ url('/approve-pengajuan/' . $pengajuan->id) }}"
                                                    class="btn btn-sm btn-info me-2">
                                                    <span class="mdi mdi-check menu-icon text-large"></span></a>
                                            @elseif($pengajuan->status_pengajuan == 'APPROVED')
                                                <a href="{{ url('/reject-pengajuan/' . $pengajuan->id) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <span class="mdi mdi-close menu-icon text-large"></span></a>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper border-top">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col d-flex">
                                        <div
                                            class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                            <i class="mdi mdi-traffic-light icon-sm my-0 "></i>
                                        </div>
                                        <div class="wrapper ps-3">
                                            <p class="mb-0 font-weight-medium text-muted">Nilai Pengajuan</p>
                                            <h4 class="font-weight-semibold mb-0">
                                                @if (isset($nilai->pengajuan))
                                                    {{ $nilai->pengajuan == null ? $nilai : $nilai->pengajuan }}
                                                @else
                                                    0
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <div
                                            class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                            <i class="mdi mdi-account-plus icon-sm my-0 "></i>
                                        </div>
                                        <div class="wrapper ps-3">
                                            <p class="mb-0 font-weight-medium text-muted">Nilai Meeting</p>
                                            <h4 class="font-weight-semibold mb-0">
                                                @if (isset($nilai->meeting))
                                                    {{ $nilai->meeting == null ? $nilai : $nilai->meeting }}
                                                @else
                                                    0
                                                @endif
                                            </h4>

                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <div
                                            class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                            <i class="mdi mdi-server-security icon-sm my-0 "></i>
                                        </div>
                                        <div class="wrapper ps-3">
                                            <p class="mb-0 font-weight-medium text-muted">Nilai Kehadiran</p>
                                            <h4 class="font-weight-semibold mb-0">
                                                @if (isset($nilai->kehadiran))
                                                    {{ $nilai->kehadiran }}
                                                @else
                                                    0
                                                @endif
                                            </h4>

                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <div
                                            class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                            <i class="mdi mdi-chart-arc icon-sm my-0 "></i>
                                        </div>
                                        <div class="wrapper ps-3">
                                            <p class="mb-0 font-weight-medium text-muted">Reward</p>
                                            <h4 class="font-weight-semibold mb-0 text-primary">
                                                @if (isset($nilai->reward))
                                                    {{ $nilai->reward }}
                                                @else
                                                    0
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    {{-- <div class="col d-flex align-items-center">
                                        <div class="image-grouped ms-auto">
                                            <img src="../../../assets/images/faces/face20.jpg" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="" alt="profile image"
                                                data-original-title="Mary Sharp">
                                            <img src="../../../assets/images/faces/face17.jpg" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="" alt="profile image"
                                                data-original-title="Cory Medina">
                                            <img src="../../../assets/images/faces/face14.jpg" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="" alt="profile image"
                                                data-original-title="Clyde Hammond">
                                            <div class="text-avatar" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="" data-original-title="4 More Peoples"><span
                                                    class="d-block pt-2">+4</span></div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
