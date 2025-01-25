<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agamas';
    protected $fillable = ['nama'];

    public function registrasi()
    {
        return $this->hasMany(Registrasi::class);
    }
}
