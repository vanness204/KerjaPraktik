<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Formulir Filter -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Filter Grafik</h3>
                    <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col sm:flex-row sm:items-end sm:space-x-4">
                        <div class="flex-grow sm:w-1/3">
                            <label for="year" class="block text-gray-700">Pilih Tahun</label>
                            <select id="year" name="year" class="form-control">
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-grow sm:w-1/3">
                            <label for="month" class="block text-gray-700">Pilih Bulan</label>
                            <select id="month" name="month" class="form-control">
                                @foreach($months as $index => $month)
                                    <option value="{{ $index + 1 }}" {{ $index + 1 == $selectedMonth ? 'selected' : '' }}>{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="rounded-md px-3 py-2 bg-blue-500 text-white transition hover:bg-blue-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-75">
                                Tampilkan Grafik
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Ringkasan Kehadiran -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Ringkasan Kehadiran Karyawan (Bulan Ini)</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-2 rounded-md">
                            <p class="font-semibold text-lg">Karyawan Hadir</p>
                            <p class="text-xl">{{ $jumlahHadir }}</p>
                        </div>
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-md">
                            <p class="font-semibold text-lg">Karyawan Izin</p>
                            <p class="text-xl">{{ $jumlahIzin }}</p>
                        </div>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md">
                            <p class="font-semibold text-lg">Karyawan Absen</p>
                            <p class="text-xl">{{ $jumlahAbsen }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Kehadiran -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Grafik Kehadiran Karyawan (Hari Ini)</h3>
                        <canvas id="chartHariIni" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Grafik Kehadiran Karyawan (Bulan)</h3>
                        <canvas id="chartBulanIni" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Grafik Kehadiran Karyawan (Tahun)</h3>
                    <canvas id="chartTahunIni" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctxHariIni = document.getElementById('chartHariIni').getContext('2d');
            var chartHariIni = new Chart(ctxHariIni, {
                type: 'line',
                data: {
                    labels: ['Hadir', 'Izin', 'Absen'],
                    datasets: [{
                        label: 'Kehadiran Karyawan (Hari Ini)',
                        data: [{{ $jumlahHadirHariIni }}, {{ $jumlahIzinHariIni }}, {{ $jumlahAbsenHariIni }}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctxBulanIni = document.getElementById('chartBulanIni').getContext('2d');
            var chartBulanIni = new Chart(ctxBulanIni, {
                type: 'line',
                data: {
                    labels: ['Hadir', 'Izin', 'Absen'],
                    datasets: [{
                        label: 'Kehadiran Karyawan (Bulan Ini)',
                        data: [{{ $jumlahHadir }}, {{ $jumlahIzin }}, {{ $jumlahAbsen }}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctxTahunIni = document.getElementById('chartTahunIni').getContext('2d');
            var chartTahunIni = new Chart(ctxTahunIni, {
                type: 'line',
                data: {
                    labels: ['Hadir', 'Izin', 'Absen'],
                    datasets: [{
                        label: 'Kehadiran Karyawan (Tahun Ini)',
                        data: [{{ $jumlahHadirTahunIni }}, {{ $jumlahIzinTahunIni }}, {{ $jumlahAbsenTahunIni }}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
