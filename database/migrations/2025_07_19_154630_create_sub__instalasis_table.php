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
        Schema::create('sub__instalasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instalasi_id')->constrained('instalasis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_sub');
            $table->string('keterangan');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub__instalasis');
    }
};