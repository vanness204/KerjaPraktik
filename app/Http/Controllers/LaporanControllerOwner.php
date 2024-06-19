<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class LaporanControllerOwner extends Controller
{
    public function index(Request $request)
    {
        $query = Absen::query();

        if ($request->filled('tanggal')) {
            $query->where('tanggal', $request->input('tanggal'));
        }

        if ($request->filled('id_karyawan')) {
            $query->where('id_karyawan', $request->input('id_karyawan'));
        }

        if ($request->filled('nama_karyawan')) {
            $query->whereHas('karyawan', function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->input('nama_karyawan') . '%');
            });
        }

        $absensi = $query->get();

        return view('dashboardOwner', compact('absensi'));
    }
}
