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

                    <form class="forms-sample mt-5" action="{{ url('/post-pengajuan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="npk">NPK</label>
                            @if (auth()->user()->akses_user == 'karyawan')
                                <input type="text" class="form-control" id="npk" placeholder="npk" name="npk"
                                    value="{{ auth()->user()->karyawans->npk }}" readonly>
                            @elseif(auth()->user()->akses_user == 'atasan')
                                <input type="text" class="form-control" id="npk" placeholder="npk" name="npk"
                                    value="{{ auth()->user()->karyawans->npk }}" readonly>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Name" name="nama"
                                value="{{ auth()->user()->karyawans->nama }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul SS</label>
                            <input type="text" class="form-control" id="judul" placeholder="Judul SS"
                                name="judul_pengajuan" value="{{ $judul }}" readonly>
                        </div>
                        {{-- <div class="form-group">
                            <label for="kondisi_sebelum">Kondisi Sebelum Perbaikan</label>
                            <input type="text" class="form-control" id="kondisi_sebelum" placeholder="Kondisi Sebelum"
                                name="kondisi_sebelum">
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="kondisi_sesudah">Kondisi Sesudah Perbaikan</label>
                            <input type="text" class="form-control" id="kondisi_sesudah" placeholder="Kondisi Sesudah"
                                name="kondisi_sesudah">
                        </div> --}}
                        <div class="form-group">
                            <label for="no_hp">Tanngal Pengajuan</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_pengajuan">
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-3 col-form-label">Status Karyawan</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status_karyawan">
                                    <option selected disabled>Pilih</option>
                                    <option>Karyawan Tetap</option>
                                    <option>Karyawan Kontrak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Kondisi Sebelum Perbaikan </label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="kondisi_sebelum"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Kondisi Sesudah Perbaikan </label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="kondisi_sesudah"></textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled=""
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary"
                                        type="button">Upload</button>
                                </span>
                            </div>
                        </div> --}}


                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{ url('/daftar-pengajuan') }}" class="btn btn-light">Cancel</a>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
