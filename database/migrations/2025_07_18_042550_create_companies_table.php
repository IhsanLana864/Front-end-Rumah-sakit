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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('logo');
            $table->longText('alamat');
            $table->string('long');
            $table->string('lat');
            $table->longText('falsafah');
            $table->longText('visi');
            $table->longText('misi');
            $table->longText('motto');
            $table->longText('budaya_kerja');
            $table->longText('eksternal');
            $table->string('kontak');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
