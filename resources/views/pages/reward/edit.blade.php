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

                    <form class="forms-sample mt-5" action="{{ url('/update-range/' . $reward->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="npk">Range Total Nilai</label>
                            <input type="text" class="form-control" placeholder="<40" name="range_total"
                                value="{{ $reward->range_total }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Reward</label>
                            <input type="text" class="form-control" id="nama" name="nominal_reward"
                                placeholder="25000" value="{{ $reward->nominal_reward }}">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{ '/daftar-range-total-reward' }}" class="btn btn-light">Cancel</a>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
