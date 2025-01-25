<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penulis extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama'];
    protected $table = 'penulis';

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
