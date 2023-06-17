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
                @if (auth()->user()->akses_user == 'karyawan')
                    <a href="{{ url('/tambah-pengajuan') }}" class="btn btn-primary btn-sm">Tambah</a>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPK</th>
                            <th>Nama Karyawan</th>
                            <th>Status Karyawan</th>
                            <th>Judul Pengajuan</th>
                            <th>Tanggal</th>
                            {{-- <th>Kondisi Sebelum</th>
                            <th>Kondisi Sesudah</th> --}}
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->npk }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->status_karyawan }}</td>
                                <td>{{ $dt->judul_pengajuan }}</td>
                                <td>{{ $dt->tanggal_pengajuan }}</td>
                                {{-- <td>{{ $dt->kondisi_sebelum }}</td>
                                <td>{{ $dt->kondisi_sesudah }}</td> --}}
                                <td>
                                    <a href="{{ url('detail-pengajuan/' . $dt->id) }}"
                                        class="btn btn-success btn-sm">Detail</a>
                                    <a href="{{ url('edit-pengajuan/' . $dt->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url('delete-pengajuan/' . $dt->id) }}" class="btn btn-danger btn-sm"
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
