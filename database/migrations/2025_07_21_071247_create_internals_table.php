<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('internals', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('kepemilikan');
            $table->string('kelas_rumah_sakit');
            $table->string('luas_tanah');
            $table->string('luas_bangunan');
            $table->longText('deskripsi_fasilitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internals');
    }
};
