<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = ['id_karyawan', 'tanggal', 'jam', 'status']; // Menambahkan id_karyawan
    protected $table = 'absen';
   
    // Definisikan relasi dengan model Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan'); // Sesuaikan dengan nama model dan nama kunci asing
    }
}
