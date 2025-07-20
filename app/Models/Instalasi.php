<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Sub_Instalasi;

class Instalasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instalasi',
    ];

    public function subInstalasis()
    {
        return $this->hasMany(Sub_Instalasi::class, 'instalasi_id', 'id');
    }
}
