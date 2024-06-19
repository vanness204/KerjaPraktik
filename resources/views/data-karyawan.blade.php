<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('simpan-karyawan') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="id_karyawan" class="block text-gray-700 text-sm font-bold mb-2">ID Karyawan:</label>
                            <input type="text" name="id_karyawan" id="id_karyawan" class="form-input rounded-md shadow-sm mt-1 block w-full" readonly />
                        </div>
                        <div class="mb-4">
                            <button type="button" class="rounded-md px-3 py-2 bg-blue-500 text-white transition hover:bg-blue-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-75" id="generate-id">
                                Generate ID
                            </button>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Karyawan:</label>
                            <input type="text" name="nama" id="nama" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="mb-4">
                            <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir:</label>
                            <select name="tempat_lahir" id="tempat_lahir" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                                <option value="">Pilih Kota</option>
                                <option value="jakarta">Jakarta</option>
                                <option value="surabaya">Surabaya</option>
                                <option value="medan">Medan</option>
                                <option value="bandung">Bandung</option>
                                <option value="bekasi">Bekasi</option>
                                <option value="tangerang">Tangerang</option>
                                <option value="makassar">Makassar</option>
                                <option value="semarang">Semarang</option>
                                <option value="depok">Depok</option>
                                <option value="bogor">Bogor</option>
                                <option value="palembang">Palembang</option>
                                <option value="denpasar">Denpasar</option>
                                <option value="malang">Malang</option>
                                <option value="pekanbaru">Pekanbaru</option>
                                <option value="bandar_lampung">Bandar Lampung</option>
                                <option value="padang">Padang</option>
                                <option value="yogyakarta">Yogyakarta</option>
                                <option value="balikpapan">Balikpapan</option>
                                <option value="pontianak">Pontianak</option>
                                <option value="samarinda">Samarinda</option>
                                <option value="jambi">Jambi</option>
                                <option value="bengkulu">Bengkulu</option>
                                <option value="kupang">Kupang</option>
                                <option value="manado">Manado</option>
                                <option value="ambon">Ambon</option>
                                <option value="ternate">Ternate</option>
                                <option value="mataram">Mataram</option>
                                <option value="jayapura">Jayapura</option>
                                <option value="gorontalo">Gorontalo</option>
                                <option value="tarakan">Tarakan</option>
                                <option value="palangka_raya">Palangka Raya</option>
                                <option value="batam">Batam</option>
                                <option value="tebing_tinggi">Tebing Tinggi</option>
                                <option value="binjai">Binjai</option>
                                <option value="padang_sidempuan">Padang Sidempuan</option>
                                <option value="lubuklinggau">Lubuklinggau</option>
                                <option value="prabumulih">Prabumulih</option>
                                <option value="pagaralam">Pagaralam</option>
                                <option value="baturaja">Baturaja</option>
                                <option value="palembang">Palembang</option>
                                <option value="lubuk_pakam">Lubuk Pakam</option>
                                <option value="medan">Medan</option>
                                <option value="pematang_siantar">Pematang Siantar</option>
                                <option value="sibolga">Sibolga</option>
                                <option value="tanjung_balai">Tanjung Balai</option>
                                <option value="binjai">Binjai</option>
                                <option value="langsa">Langsa</option>
                                <option value="banda_aceh">Banda Aceh</option>
                                <option value="sabang">Sabang</option>
                                <option value="lhokseumawe">Lhokseumawe</option>
                                <option value="subulussalam">Subulussalam</option>
                                <option value="meulaboh">Meulaboh</option>
                                <option value="singkil">Singkil</option>
                                <option value="tapaktuan">Tapaktuan</option>
                                <option value="sinabang">Sinabang</option>
                                <option value="yogyakarta">Yogyakarta</option>
                                <option value="wonosari">Wonosari</option>
                                <option value="magelang">Magelang</option>
                                <option value="purwokerto">Purwokerto</option>
                                <option value="pekalongan">Pekalongan</option>
                                <option value="tegal">Tegal</option>
                                <option value="brebes">Brebes</option>
                                <option value="cilacap">Cilacap</option>
                                <option value="banjarnegara">Banjarnegara</option>
                                <option value="semarang">Semarang</option>
                                <option value="jepara">Jepara</option>
                                <option value="pati">Pati</option>
                                <option value="kudus">Kudus</option>
                                <option value="surakarta">Surakarta</option>
                                <option value="klaten">Klaten</option>
                                <option value="yogyakarta">Yogyakarta</option>
                                <option value="sleman">Sleman</option>
                                <option value="mataram">Mataram</option>
                                <option value="denpasar">Denpasar</option>
                                <option value="tabanan">Tabanan</option>
                                <option value="bangli">Bangli</option>
                                <option value="singaraja">Singaraja</option>
                                <option value="jatim">Jatim</option>
                                <option value="surabaya">Surabaya</option>
                                <option value="malang">Malang</option>
                                <option value="batu">Batu</option>
                                <option value="kediri">Kediri</option>
                                <option value="madiun">Madiun</option>
                                <option value="blitar">Blitar</option>
                                <option value="pasuruan">Pasuruan</option>
                                <option value="probolinggo">Probolinggo</option>
                                <option value="jember">Jember</option>
                                <option value="tulungagung">Tulungagung</option>
                                <option value="bojonegoro">Bojonegoro</option>
                                <option value="bangkalan">Bangkalan</option>
                                <option value="lamongan">Lamongan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="mb-4">
                            <label for="agama" class="block text-gray-700 text-sm font-bold mb-2">Agama:</label>
                            <select name="agama" id="agama" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                                <option value="">Pilih Agama</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="no_telepon" class="block text-gray-700 text-sm font-bold mb-2">No Telepon:</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="rounded-md px-3 py-2 bg-blue-500 text-white transition hover:bg-blue-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-75">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- pemisah form -->
            <div class="mt-8"></div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Daftar karyawan</h3>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="p-3 border border-gray-300">ID Karyawan</th>
                                <th class="p-3 border border-gray-300">Nama Karyawan</th>
                                <th class="p-3 border border-gray-300">Tempat Lahir</th>
                                <th class="p-3 border border-gray-300">Tanggal Lahir</th>
                                <th class="p-3 border border-gray-300">Agama</th>
                                <th class="p-3 border border-gray-300">No Telepon</th>
                                <th class="p-3 border border-gray-300">Aksi</th> <!-- Tambah kolom untuk aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyawan->sortBy('nama') as $item)
                            <tr>
                                <td class="p-3 border border-gray-300">{{ $item->id_karyawan }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->nama }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->tempat_lahir }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->tanggal_lahir }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->agama }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->no_telepon }}</td>
                                <td class="p-3 border border-gray-300">
                                    <form action="{{ route('hapus-karyawan', $item->id_karyawan) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan link CSS Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Tambahkan script jQuery dan Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.getElementById('generate-id').addEventListener('click', function() {
            document.getElementById('id_karyawan').value = Math.floor(Math.random() * 900000) + 100000;
        });

        $(document).ready(function() {
            $('#tempat_lahir').select2({
                placeholder: "Pilih Kota",
                allowClear: true
            });
        });
    </script>
</x-app-layout>
