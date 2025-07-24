<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tentang_Kami extends Model
{
    use HasFactory;

    protected $table = 'tentang__kamis';

    protected $fillable = [
        'gambar1',
        'gambar2',
        'gambar3',
    ];
}
