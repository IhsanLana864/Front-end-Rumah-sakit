<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instalasi;

class Sub_Instalasi extends Model
{
    use HasFactory;

    protected $table = 'sub__instalasis';

    protected $fillable = [
        'instalasi_id',
        'nama_sub',
        'keterangan',
        'logo',
    ];

    /**
     * Get the instalasi that owns the SubInstalasi.
     */
    public function instalasi()
    {
        return $this->belongsTo(Instalasi::class);
    }
}