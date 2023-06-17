@extends('layout.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    {{-- <p class="card-description"> Basic form elements </p> --}}
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $item)
                                <li><span>{{ $item }}</span></li>
                            @endforeach

                        </div>
                    @endif

                    <form class="forms-sample mt-5" action="{{ url('/post-nilai') }}" method="POST">
                        @csrf

                        <div class="form-group ">
                            <label class="col-sm-3 col-form-label">Nomor Pengajuan SS</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="judul_pengajuan">
                                    <option selected disabled>Pilih Nomor Pengajuan</option>
                                    @foreach ($pengajuan as $item)
                                        <option {{ $item->id == $nilai->pengajuan_id ? 'selected' : '' }}
                                            value="{{ $item->id }}">{{ $item->judul_pengajuan }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-sm-3 col-form-label">Pengajuan SS</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="pengajuan">
                                    <option selected disabled>Pilih Nilai</option>
                                    @for ($i = 1; $i <= $paramsPengajuan; $i++)
                                        <option {{ $nilai->pengajuan == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor

                                </select>
                                <span
                                    class="text-danger text-small">{{ 'Range' . '[' . ' 0 ' . '-' . $paramsPengajuan . ']' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-3 col-form-label">Meeting</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="meeting">
                                    <option selected disabled>Pilih Nilai</option>
                                    @for ($i = 1; $i <= $paramsMeeting; $i++)
                                        <option {{ $nilai->meeting == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor

                                </select>
                                <span
                                    class="text-danger text-small">{{ 'Range' . '[' . ' 0 ' . '-' . $paramsMeeting . ']' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-3 col-form-label">Kehadiran</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="kehadiran">
                                    <option selected disabled>Pilih Nilai</option>
                                    @for ($i = 1; $i <= $paramsKehadiran; $i++)
                                        <option {{ $nilai->kehadiran == $i ? 'selected' : '' }}>{{ $i }}
                                        </option>
                                    @endfor

                                </select>
                                <span
                                    class="text-danger text-small">{{ 'Range' . '[' . ' 0 ' . '-' . $paramsKehadiran . ']' }}</span>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{ '/daftar-proses-nilai' }}" class="btn btn-light">Cancel</a>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
