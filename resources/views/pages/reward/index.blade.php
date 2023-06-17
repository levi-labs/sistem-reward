@extends('layout.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                @endif

                {{-- <p class="card-description"> Add class <code>.table-hover</code>
                </p> --}}
                @if ($data->count() == 0)
                    <a href="{{ url('/tambah-range') }}" class="btn btn-primary btn-sm">Tambah</a>
                @elseif($data->count() >= 3)
                    <button disabled class="btn btn-secondary btn-sm">Tambah</button>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>

                            <th>Range Total Penilaian</th>
                            <th>Nominal Reward</th>

                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->range_total }}</td>
                                <td>{{ $dt->nominal_reward }}</td>


                                <td>

                                    <a href="{{ url('/edit-range/' . $dt->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url('/delete-range/' . $dt->id) }}" class="btn btn-danger btn-sm"
                                        onclick="javascript:return confirm('yakin ingin menghapus data ini?')">Hapus</a>
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
