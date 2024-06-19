<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_karyawan';

    protected $fillable = ['id_karyawan','nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'no_telepon'];
    protected $table = 'karyawan';
}


