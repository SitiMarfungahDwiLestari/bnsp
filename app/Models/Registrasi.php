<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    protected $table = 'registrasi';


    protected $fillable = [
        'nama', 'email', 'tanggal_lahir', 'nomor_telepon', 'id_agama', 'alamat'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];

    protected $dates = ['tanggal_lahir'];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }
}
