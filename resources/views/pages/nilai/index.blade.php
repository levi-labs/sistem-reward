@extends('layout.master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card ">
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
                <div class="col-4 mb-3 d-print-none">
                    <a href="{{ url('/tambah-nilai') }}" class="btn btn-primary btn-sm ">Tambah</a>
                    <a href="{{ url('print-nilai') }}" class="btn btn-secondary btn-sm " target="_blank">Print</a>
                </div>

                <table class="table table-bordered" style="border-collapse: collapse; border: 1px solid black;">
                    <thead>
                        <tr>
                            <th style="background-color: rgb(251, 215, 158)" class="text-center" rowspan="2">No</th>

                            <th style="background-color: rgb(251, 215, 158)" class="text-center" rowspan="2">Nama
                                Karyawan
                            </th>
                            <th style="background-color: rgb(251, 215, 158)" class="text-center" rowspan="2">Line
                                Produksi
                            </th>
                            <th style="background-color: rgb(251, 215, 158)" class="text-center" colspan="5">Kriteria
                                Penilaian Kinerja</th>


                            <th style="background-color: rgb(251, 215, 158)" rowspan="2" class="text-center">Option</th>
                        </tr>
                        <tr>
                            <th style="background-color: rgb(159, 202, 86)">Pengajuan</th>
                            <th style="background-color: rgb(159, 202, 86)">Kehadiran</th>
                            <th style="background-color: rgb(159, 202, 86)">Meeting</th>
                            <th style="background-color: rgb(159, 202, 86)">Total</th>
                            <th style="background-color: rgb(159, 202, 86)">Reward</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->karyawans->nama }}</td>
                                <td>{{ $dt->karyawans->line_produksi }}</td>
                                <td>{{ $dt->pengajuan }}</td>
                                <td>{{ $dt->meeting }}</td>
                                <td>{{ $dt->kehadiran }}</td>
                                <td>{{ $dt->total }}</td>
                                <td>{{ $dt->reward }}</td>


                                <td>

                                    <a href="{{ url('edit-nilai/' . $dt->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url('delete-nilai/' . $dt->id) }}" class="btn btn-danger btn-sm"
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
