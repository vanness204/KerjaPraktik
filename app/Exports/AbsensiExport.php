<?php

namespace App\Exports;

use App\Models\Absen;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    protected $absensi;

    public function __construct(Collection $absensi)
    {
        $this->absensi = $absensi;
    }

    public function collection()
    {
        return $this->absensi->map(function ($absen) {
            return [
                'ID Karyawan' => $absen->id_karyawan,
                'Nama Karyawan' => $absen->karyawan->nama,
                'Tanggal' => $absen->tanggal,
                'Jam' => $absen->jam,
                'Status' => $absen->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID Karyawan',
            'Nama Karyawan',
            'Tanggal',
            'Jam',
            'Status',
        ];
    }
}
