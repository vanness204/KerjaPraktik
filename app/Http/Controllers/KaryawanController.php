<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        // Mengambil semua data karyawan dari database
        $karyawan = Karyawan::all();
        
        // Mengirim data karyawan ke view data-karyawan
        return view('data-karyawan', ['karyawan' => $karyawan]);
    }
    public function create()
    {
        return view('data-karyawan');
    }
    
    // Metode untuk menghapus karyawan
    public function hapus($id_karyawan)
    {
        // Temukan karyawan berdasarkan ID
        $karyawan = Karyawan::find($id_karyawan);
    
        // Hapus karyawan
        $karyawan->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('data-karyawan');
    }
    
    public function simpanKaryawan(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_karyawan' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'no_telepon' => 'required',
        ]);
    
        // Simpan data ke database
        Karyawan::create([
            'id_karyawan' => $request->id_karyawan,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'no_telepon' => $request->no_telepon,
        ]);
    // Redirect dengan pesan sukses
    return redirect('/data-karyawan')->with('success', 'Data karyawan berhasil disimpan.');
}

}
