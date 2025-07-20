<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'logo',
        'alamat',
        'long',
        'lat',
        'falsafah',
        'visi',
        'misi',
        'motto',
        'budaya_kerja',
        'internal',
        'eksternal',
        'kontak',
        'email'
    ];
}
