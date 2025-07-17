<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facilitie extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'judul',
        'keterangan'
    ];
}
