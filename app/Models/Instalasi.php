<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instalasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instalasi',
    ];

    public function subInstalasis()
    {
        return $this->hasMany(SubInstalasi::class, 'instalasi_id', 'id');
    }
}
