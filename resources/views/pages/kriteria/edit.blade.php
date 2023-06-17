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

                    <form class="forms-sample mt-5" action="{{ url('/update-kriteria/' . $kriteria->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="npk">Kriteria Kinerja</label>
                            <input type="text" class="form-control" id="npk" placeholder="Pengajuan SS"
                                name="kriteria_kinerja" value="{{ $kriteria->kriteria_kinerja }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Range Nilai</label>
                            <input type="text" class="form-control" id="nama" name="range_nilai"
                                value="{{ $kriteria->range_nilai }}" placeholder="20 - 30">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{ url('/daftar-kriteria-penilaian') }}" class="btn btn-light">Cancel</a>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
