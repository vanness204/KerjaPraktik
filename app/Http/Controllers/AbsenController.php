<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Karyawan;

class AbsenController extends Controller
{
    // Menampilkan formulir untuk membuat absensi baru
    public function index(Request $request)
    {
        // Mengambil semua data karyawan dari database
        $karyawan = Karyawan::all();
        
        // Mengembalikan view 'absensi' dan mengirimkan data karyawan ke dalam view
        return view('absensi', compact('karyawan'));
    }
    
    // Menyimpan data absensi yang baru
    public function simpanAbsensi(Request $request)
    {
        // Validasi input
        $request->validate([
            'absensi' => 'required|array', // Pastikan data absensi merupakan array
            'absensi.*.id_karyawan' => 'required', // Setiap data absensi harus memiliki id_karyawan
            'absensi.*.tanggal' => 'required|date',
            'absensi.*.jam' => 'required',
            'absensi.*.status' => 'required',
        ]);
        
        // Loop melalui setiap data absensi dan simpan ke database
        foreach ($request->absensi as $absensiData) {
            Absen::create([
                'id_karyawan' => $absensiData['id_karyawan'],
                'tanggal' => $absensiData['tanggal'],
                'jam' => $absensiData['jam'],
                'status' => $absensiData['status'],
            ]);
        }
    
        // Redirect dengan pesan sukses
        return redirect()->route('absen')->with('success', 'Absensi berhasil disimpan.');
    }    
}
 