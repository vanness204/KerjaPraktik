<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight print:hidden">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Daftar Absensi</h3>
                    <form action="{{ route('laporan.filter') }}" method="post">
                        @csrf
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div>
                                    <label for="tanggal_dari" class="block text-sm font-medium text-gray-700">Tanggal Dari:</label>
                                    <input type="date" name="tanggal_dari" id="tanggal_dari" value="{{ request()->get('tanggal_dari') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="tanggal_sampai" class="block text-sm font-medium text-gray-700">Tanggal Sampai:</label>
                                    <input type="date" name="tanggal_sampai" id="tanggal_sampai" value="{{ request()->get('tanggal_sampai') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Nama Karyawan:</label>
                                    <input type="text" name="nama_karyawan" id="nama_karyawan" value="{{ request()->get('nama_karyawan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="flex items-end justify-end space-x-2">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Terapkan
                                    </button>
                                    <a href="{{ route('laporan.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Refresh
                                    </a>
                                    <a href="{{ route('laporan.download', request()->all()) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="mt-8"></div>
                    @if($absensi->count() > 0)
                    <table class="min-w-full border-collapse table-auto">
                        <thead>
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">No</th>
                                <th class="border border-gray-400 px-4 py-2">ID Karyawan</th>
                                <th class="border border-gray-400 px-4 py-2">Nama Karyawan</th>
                                <th class="border border-gray-400 px-4 py-2">Tanggal</th>
                                <th class="border border-gray-400 px-4 py-2">Jam</th>
                                <th class="border border-gray-400 px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absensi as $index => $absen)
                            <tr>
                                <td class="border border-gray-400 px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $absen->id_karyawan }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $absen->karyawan->nama }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $absen->tanggal }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $absen->jam }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $absen->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Tidak ada data absensi yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
