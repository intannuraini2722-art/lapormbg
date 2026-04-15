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
        Schema::create('lokasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lokasi');
        });

        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->text('penjelasan');
        });

        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users');
            $table->string('nama_pelapor');
            $table->string('tipe_user'); // ortu, guru, siswa, dll
            $table->date('tanggal_lapor');
            $table->foreignId('id_lokasi')->constrained('lokasi');
            $table->foreignId('id_kategori')->constrained('kategori');
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->enum('status', ['menunggu', 'selesai'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
