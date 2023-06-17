<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        -webkit-print-color-adjust: exact;
    }

    table {
        margin: auto;
        width: 100%;
    }

    th,
    td {
        text-align: center
    }

    .top-th {
        background-color: rgb(251, 215, 158);
    }
</style>

<body>
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

                <table class="table table-bordered text-center"
                    style="border-collapse: collapse; border: 1px solid black;" border="2">
                    <thead>
                        <tr>
                            <th style="background-color: rgb(251, 215, 158)" class="top-th" rowspan="2">No</th>

                            <th style="background-color: rgb(251, 215, 158)" class="top-th" rowspan="2">Nama
                                Karyawan
                            </th>
                            <th style="background-color: rgb(251, 215, 158)" class="top-th" rowspan="2">Line
                                Produksi
                            </th>
                            <th style="background-color: rgb(251, 215, 158)" class="top-th" rowspan="2">Tanggal
                            </th>
                            <th style="background-color: rgb(251, 215, 158)" class="top-th" colspan="5">Kriteria
                                Penilaian Kinerja</th>



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
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->line_produksi }}</td>
                                <td>{{ $dt->tanggal }}</td>
                                <td>{{ $dt->pengajuan }}</td>
                                <td>{{ $dt->meeting }}</td>
                                <td>{{ $dt->kehadiran }}</td>
                                <td>{{ $dt->total }}</td>
                                <td>{{ $dt->reward }}</td>



                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<Script>
    document.addEventListener('DOMContentLoaded', function() {
        window.print();
    });
</Script>

</html>
