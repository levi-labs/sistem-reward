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
                    @elseif(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="forms-sample mt-5" action="{{ url('/update-password/' . auth()->user()->id) }}"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="npk">Old Password</label>
                            <input type="password" class="form-control" id="npk" name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
