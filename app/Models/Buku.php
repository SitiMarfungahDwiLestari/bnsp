<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Buku.php
class Buku extends Model
{
    protected $table = 'buku';  // Tambahkan ini
    protected $fillable = ['penulis_id', 'judul', 'published_date'];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }
}
