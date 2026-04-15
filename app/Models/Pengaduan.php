<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'id_user',
        'nama_pelapor',
        'tipe_user',
        'tanggal_lapor',
        'id_lokasi',
        'id_kategori',
        'deskripsi',
        'foto',
        'status',
    ];

    // Relasi balik ke Pengguna
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi balik ke Lokasi
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    // Relasi balik ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
