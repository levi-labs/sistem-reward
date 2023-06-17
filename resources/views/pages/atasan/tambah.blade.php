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

                    <form class="forms-sample mt-5" action="{{ url('/post-atasan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="npk">NPK</label>
                            <input type="text" class="form-control" id="npk" placeholder="npk" name="npk"
                                value="{{ $npk }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Name" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" id="no_hp" placeholder="08123292929"
                                name="no_hp">
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jabatan">
                                    <option selected disabled>Pilih</option>
                                    <option>Foreman</option>
                                    <option>Supervisor</option>
                                    <option>Section Manager</option>
                                </select>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{ url('/daftar-atasan') }}" class="btn btn-light">Cancel</a>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
