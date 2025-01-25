<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok'
    ];

    // Relasi dengan peminjaman (jika nanti diperlukan)
    // public function peminjaman()
    // {
    //     return $this->hasMany(Peminjaman::class);
    // }
}
