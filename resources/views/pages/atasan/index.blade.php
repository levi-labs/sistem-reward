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

                <a href="{{ url('tambah-atasan') }}" class="btn btn-primary btn-sm">Tambah</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPK</th>
                            <th>Nama Atasan</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->npk }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->jabatan }}</td>
                                <td>{{ $dt->email }}</td>
                                <td>{{ $dt->no_hp }}</td>
                                <td>
                                    <a href="{{ url('edit-atasan/' . $dt->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url('delete-atasan/' . $dt->id) }}" class="btn btn-danger btn-sm"
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
