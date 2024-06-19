<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="absensi-form" action="{{ route('simpan-absensi') }}" method="POST">
                        @csrf
                        <div class="flex justify-start mb-4">
                            <button type="button" id="simpanBtn" onclick="simpanData()" class="mr-3 rounded-md px-3 py-2 bg-blue-500 text-white transition hover:bg-blue-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-75">
                                Simpan
                            </button>
                            <button type="button" onclick="location.reload();" class="rounded-md px-3 py-2 bg-green-500 text-white transition hover:bg-green-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-green-500 focus-visible:ring-opacity-75">
                                Refresh
                            </button>
                        </div>  
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="p-3 border border-gray-300">ID Karyawan</th>
                                    <th class="p-3 border border-gray-300">Nama Karyawan</th>
                                    <th class="p-3 border border-gray-300">Tanggal</th>
                                    <th class="p-3 border border-gray-300">Jam</th>
                                    <th class="p-3 border border-gray-300">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($karyawan as $item)
                                    <tr>
                                        <td class="p-3 border border-gray-300">{{ $item->id_karyawan }}
                                            <input type="hidden" name="absensi[{{ $loop->index }}][id_karyawan]" value="{{ $item->id_karyawan }}">
                                        </td>
                                        <td class="p-3 border border-gray-300">{{ $item->nama }}</td>
                                        <td class="p-3 border border-gray-300">
                                            <input type="date" name="absensi[{{ $loop->index }}][tanggal]" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                                        </td>
                                        <td class="p-3 border border-gray-300">
                                            <input type="time" name="absensi[{{ $loop->index }}][jam]" class="form-input rounded-md shadow-sm mt-1 block w-full" required readonly />
                                        </td>
                                        <td class="p-3 border border-gray-300">
                                            <div class="flex items-center">
                                                <input type="radio" id="Hadir_{{ $item->id_karyawan }}" name="absensi[{{ $loop->index }}][status]" value="Hadir" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" checked>
                                                <label for="Hadir_{{ $item->id_karyawan }}" class="ml-2 mr-4">Hadir</label>
                                                <input type="radio" id="izin_{{ $item->id_karyawan }}" name="absensi[{{ $loop->index }}][status]" value="izin" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="izin_{{ $item->id_karyawan }}" class="ml-2 mr-4">Izin</label>
                                                <input type="radio" id="absen_{{ $item->id_karyawan }}" name="absensi[{{ $loop->index }}][status]" value="absen" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="absen_{{ $item->id_karyawan }}" class="ml-2">Absen</label>
                                            </div>
                                        </td>                                    
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pengaturan tanggal
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            var tanggalInputs = document.querySelectorAll('input[type="date"]');
            tanggalInputs.forEach(function(input) {
                input.value = today;
            });

            // Pengaturan waktu
            var jamInputs = document.querySelectorAll('input[type="time"]');
            jamInputs.forEach(function(input) {
                // Periksa apakah input jam sudah memiliki nilai atau tidak
                if (!input.value) {
                    var now = new Date();
                    var hours = String(now.getHours()).padStart(2, '0');
                    var minutes = String(now.getMinutes()).padStart(2, '0');
                    var currentTime = hours + ':' + minutes;
                    input.value = currentTime;
                }
                // Hapus atribut readonly dari input jam
                input.removeAttribute('readonly');
            });
        });
      
        async function simpanData() {
        var form = document.getElementById('absensi-form');
        form.submit();
        
        // Tampilkan popup setelah pengiriman form
        await Swal.fire({
            icon: 'success',
            title: 'Data berhasil disimpan!',
            showConfirmButton: false,
            timer: 1500
        });
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</x-app-layout>
