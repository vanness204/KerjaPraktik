<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Exports\AbsensiExport; // Pastikan ini sesuai dengan namespace dari AbsensiExport
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $absensi = Absen::with('karyawan')
            ->when($request->filled('tanggal_dari') && $request->filled('tanggal_sampai'), function ($query) use ($request) {
                $query->whereBetween('tanggal', [$request->tanggal_dari, $request->tanggal_sampai]);
            })
            ->when($request->filled('nama_karyawan'), function ($query) use ($request) {
                $query->whereHas('karyawan', function ($subQuery) use ($request) {
                    $subQuery->where('nama', 'like', '%' . $request->nama_karyawan . '%');
                });
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('laporan', ['absensi' => $absensi]);
    }

    public function filter(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal_dari' => 'nullable|date',
            'tanggal_sampai' => 'nullable|date|after_or_equal:tanggal_dari',
        ]);

        $tanggalDari = $request->tanggal_dari;
        $tanggalSampai = $request->tanggal_sampai;
        $namaKaryawan = $request->nama_karyawan;

        $absensi = Absen::with('karyawan')
            ->when($tanggalDari && $tanggalSampai, function ($query) use ($tanggalDari, $tanggalSampai) {
                $query->whereBetween('tanggal', [$tanggalDari, $tanggalSampai]);
            })
            ->when($namaKaryawan, function ($query) use ($namaKaryawan) {
                $query->whereHas('karyawan', function ($subQuery) use ($namaKaryawan) {
                    $subQuery->where('nama', 'like', '%' . $namaKaryawan . '%');
                });
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('laporan', ['absensi' => $absensi]);
    }

    public function download(Request $request)
    {
        $absensi = Absen::with('karyawan')
            ->when($request->filled('tanggal_dari') && $request->filled('tanggal_sampai'), function ($query) use ($request) {
                $query->whereBetween('tanggal', [$request->tanggal_dari, $request->tanggal_sampai]);
            })
            ->when($request->filled('nama_karyawan'), function ($query) use ($request) {
                $query->whereHas('karyawan', function ($subQuery) use ($request) {
                    $subQuery->where('nama', 'like', '%' . $request->nama_karyawan . '%');
                });
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        return Excel::download(new AbsensiExport($absensi), 'laporan_absensi.xlsx');
    }
}
