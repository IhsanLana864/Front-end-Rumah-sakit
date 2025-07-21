<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Internal extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'kepemilikan',
        'kelas_rumah_sakit',
        'luas_tanah',
        'luas_bangunan',
        'deskripsi_fasilitas',
    ];
}
