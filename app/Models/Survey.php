<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jam',
        'jenis_kelamin',
        'pendidikan',
        'pekerjaan',
        'layanan',
        'survey1',
        'survey2',
        'survey3',
        'survey4',
        'survey5',
        'survey6',
        'survey7',
        'survey8',
        'survey9',
    ];
}