<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use Carbon\Carbon;

class GrafikController extends Controller
{
    public function index(Request $request)
    {
        // Default year and month
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        // Get selected year and month from request, or use defaults
        $selectedYear = $request->input('year', $currentYear);
        $selectedMonth = $request->input('month', $currentMonth);

        // Fetch years for dropdown (assuming the data starts from 2020)
        $years = range(2020, Carbon::now()->year);

        // Fetch months for dropdown
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Fetch attendance data for selected month
        $absenData = Absen::whereYear('tanggal', $selectedYear)
                          ->whereMonth('tanggal', $selectedMonth)
                          ->get();

        // Calculate monthly summary
        $jumlahHadir = $absenData->where('status', 'hadir')->count();
        $jumlahIzin = $absenData->where('status', 'izin')->count();
        $jumlahAbsen = $absenData->where('status', 'absen')->count();

        // Today's data
        $today = Carbon::today();
        $absenToday = Absen::whereDate('tanggal', $today)->get();
        $jumlahHadirHariIni = $absenToday->where('status', 'hadir')->count();
        $jumlahIzinHariIni = $absenToday->where('status', 'izin')->count();
        $jumlahAbsenHariIni = $absenToday->where('status', 'absen')->count();

        // Fetch attendance data for selected year
        $absenDataTahun = Absen::whereYear('tanggal', $selectedYear)->get();
        $jumlahHadirTahunIni = $absenDataTahun->where('status', 'hadir')->count();
        $jumlahIzinTahunIni = $absenDataTahun->where('status', 'izin')->count();
        $jumlahAbsenTahunIni = $absenDataTahun->where('status', 'absen')->count();

        return view('grafik', [
            'years' => $years,
            'months' => $months,
            'selectedYear' => $selectedYear,
            'selectedMonth' => $selectedMonth,
            'jumlahHadir' => $jumlahHadir,
            'jumlahIzin' => $jumlahIzin,
            'jumlahAbsen' => $jumlahAbsen,
            'jumlahHadirHariIni' => $jumlahHadirHariIni,
            'jumlahIzinHariIni' => $jumlahIzinHariIni,
            'jumlahAbsenHariIni' => $jumlahAbsenHariIni,
            'jumlahHadirTahunIni' => $jumlahHadirTahunIni,
            'jumlahIzinTahunIni' => $jumlahIzinTahunIni,
            'jumlahAbsenTahunIni' => $jumlahAbsenTahunIni,
        ]);
    }
}
