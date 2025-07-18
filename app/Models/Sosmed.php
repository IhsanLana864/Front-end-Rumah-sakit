<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sosmed extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'nama_sosmed',
        'username',
        'link'
    ];
}
