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
                @if (auth()->user()->akses_user == 'atasan')
                    <a href="{{ url('tambah-karyawan') }}" class="btn btn-primary btn-sm">Tambah</a>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPK</th>
                            <th>Nama Karyawan</th>
                            <th>Line Produksi</th>
                            <th>Email</th>
                            <th>No HP</th>
                            @if (auth()->user()->akses_user == 'atasan')
                                <th>Option</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->npk }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->line_produksi }}</td>
                                <td>{{ $dt->email }}</td>
                                <td>{{ $dt->no_hp }}</td>
                                @if (auth()->user()->akses_user == 'atasan')
                                    <td>
                                        <a href="{{ url('edit-karyawan/' . $dt->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ url('delete-karyawan/' . $dt->id) }}" class="btn btn-danger btn-sm"
                                            onclick="javascript:return confirm('yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                @endif


                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
