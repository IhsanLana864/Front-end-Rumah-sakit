<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelayanan',
        'hari',
        'jam_pendaftaran_awal',
        'jam_pendaftaran_akhir',
        'jam_praktek_awal',
        'jam_praktek_akhir'
    ];
}
