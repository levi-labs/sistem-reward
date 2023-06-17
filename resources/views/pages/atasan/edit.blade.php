@extends('layout.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Karyawan</h4>
                    {{-- <p class="card-description"> Basic form elements </p> --}}
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $item)
                                <li><span>{{ $item }}</span></li>
                            @endforeach

                        </div>
                    @endif

                    <form class="forms-sample mt-5" action="{{ url('/update-atasan/' . $atasan->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="npk">NPK</label>
                            <input type="text" class="form-control" id="npk" placeholder="npk" name="npk"
                                value="{{ $atasan->npk }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Name" name="nama"
                                value="{{ $atasan->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                value="{{ $atasan->email }}">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" id="no_hp" placeholder="08123292929"
                                name="no_hp" value="{{ $atasan->no_hp }}">
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-3 col-form-label">Line Produksi</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jabatan">
                                    <option selected disabled>Pilih</option>
                                    <option {{ $atasan->jabatan == 'Foreman' ? 'selected' : '' }}>Foreman</option>
                                    <option {{ $atasan->jabatan == 'Supervisor' ? 'selected' : '' }}>Supervisor
                                    </option>
                                    <option {{ $atasan->jabatan == 'Section Manager' ? 'selected' : '' }}>Section
                                        Manager</option>
                                </select>
                            </div>
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

                        {{-- <div class="form-group">
                            <label for="exampleTextarea1">Textarea</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                        </div> --}}
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{ url('/daftar-atasan') }}" class="btn btn-light">Cancel</a>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
