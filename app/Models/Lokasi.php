<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    public $timestamps = false; // Matikan jika tabel ini tidak punya created_at/updated_at

    protected $fillable = ['nama_lokasi'];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_lokasi');
    }
}
