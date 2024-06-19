<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Mengatur nilai default untuk tahun dan bulan jika tidak ada input dari pengguna
        $selectedYear = $request->input('year', Carbon::now()->year);
        $selectedMonth = $request->input('month', Carbon::now()->month);

        // Mengambil data absensi berdasarkan filter tahun dan bulan
        $totalHadir = Absen::where('status', 'Hadir')->count();

        $absenBulanIni = Absen::whereYear('tanggal', $selectedYear)
            ->whereMonth('tanggal', $selectedMonth)
            ->get();

        $jumlahHadir = $absenBulanIni->where('status', 'Hadir')->count();
        $jumlahIzin = $absenBulanIni->where('status', 'izin')->count();
        $jumlahAbsen = $absenBulanIni->where('status', 'absen')->count();

        $hariIni = Carbon::now()->format('Y-m-d');
        $absenHariIni = Absen::whereDate('tanggal', $hariIni)->get();
        $jumlahHadirHariIni = $absenHariIni->where('status', 'Hadir')->count();
        $jumlahIzinHariIni = $absenHariIni->where('status', 'izin')->count();
        $jumlahAbsenHariIni = $absenHariIni->where('status', 'absen')->count();

        $absenTahunIni = Absen::whereYear('tanggal', $selectedYear)->get();
        $jumlahHadirTahunIni = $absenTahunIni->where('status', 'Hadir')->count();
        $jumlahIzinTahunIni = $absenTahunIni->where('status', 'izin')->count();
        $jumlahAbsenTahunIni = $absenTahunIni->where('status', 'absen')->count();

        // Mengambil tahun-tahun yang unik dari data absensi yang ada
        $availableYears = Absen::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Menghasilkan pilihan tahun dari tahun-tahun yang ada dalam database
        $years = $availableYears->toArray();

        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        return view('dashboard', compact(
            'totalHadir',
            'jumlahHadir',
            'jumlahIzin',
            'jumlahAbsen',
            'jumlahHadirHariIni',
            'jumlahIzinHariIni',
            'jumlahAbsenHariIni',
            'jumlahHadirTahunIni',
            'jumlahIzinTahunIni',
            'jumlahAbsenTahunIni',
            'years',
            'months',
            'selectedYear',
            'selectedMonth'
        ));
    }

    
    public function dashboard(Request $request)
{
    $selectedYear = $request->input('year', date('Y'));
    $selectedMonth = $request->input('month', date('m'));

    $years = range(date('Y'), date('Y') - 10); // Menampilkan 10 tahun terakhir
    $months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Query untuk mendapatkan data absensi berdasarkan tahun dan bulan yang dipilih
    $jumlahHadir = Absensi::whereYear('tanggal', $selectedYear)
                          ->whereMonth('tanggal', $selectedMonth)
                          ->where('status', 'hadir')
                          ->count();

    $jumlahIzin = Absensi::whereYear('tanggal', $selectedYear)
                         ->whereMonth('tanggal', $selectedMonth)
                         ->where('status', 'izin')
                         ->count();

    $jumlahAbsen = Absensi::whereYear('tanggal', $selectedYear)
                          ->whereMonth('tanggal', $selectedMonth)
                          ->where('status', 'absen')
                          ->count();

    return view('dashboard', compact('years', 'months', 'jumlahHadir', 'jumlahIzin', 'jumlahAbsen', 'selectedYear', 'selectedMonth'));
}
}
