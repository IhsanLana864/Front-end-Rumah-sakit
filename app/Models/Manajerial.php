<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manajerial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
    ];
}
