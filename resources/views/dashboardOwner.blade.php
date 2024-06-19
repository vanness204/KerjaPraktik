@extends('layoutsOwner.appO')

@section('title', 'Owner Dashboard')

@section('content')

    <!-- Header -->
    <div name="header" class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Kehadiran') }}
            </h2>
        </div>
    </div>

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: linear-gradient(to right, #ff4b5c, #ff717a);
                color: white;
                font-family: 'Arial', sans-serif;
            }
            .table-container {
                background-color: rgba(255, 255, 255, 0.9);
                padding: 20px;
                border-radius: 10px;
                margin-top: 20px;
            }
            .table thead {
                background-color: #ff4b5c;
                color: white;
            }
            .table tbody tr:nth-child(odd) {
                background-color: #ffe5e8;
            }
            .table-container h2 {
                color: black;
            }
            .table-container p {
                color: black;
            }
            .btn-primary {
                background-color: #ff4b5c;
                border-color: #ff4b5c;
            }
        </style>

        <!-- Main Content -->
        <div class="container mt-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-container mt-5">
                
                <!-- Formulir Filter -->
                <form method="GET" action="{{ route('owner.laporan.index') }}" class="mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="{{ request('tanggal') }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="id_karyawan" class="form-control" placeholder="ID Karyawan" value="{{ request('id_karyawan') }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="{{ request('nama_karyawan') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('owner.laporan.index') }}" class="btn btn-primary">Refresh</a>
                        </div>
                    </div>
                </form>

                @if($absensi->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absensi as $index => $absen)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $absen->id_karyawan }}</td>
                                    <td>{{ $absen->karyawan->nama }}</td>
                                    <td>{{ $absen->tanggal }}</td>
                                    <td>{{ $absen->jam }}</td>
                                    <td>{{ $absen->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Tidak ada data absensi yang tersedia.</p>
                @endif
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
@endsection
