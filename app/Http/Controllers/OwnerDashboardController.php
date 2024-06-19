<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        // Ambil data absensi dengan relasi ke karyawan
        $absensi = Absen::with('karyawan')->get();

        return view('dashboardOwner', compact('absensi'));
    }
}
