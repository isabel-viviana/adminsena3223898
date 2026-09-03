<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    protected $table = 'modalidades';

    protected $fillable = [
        'nombre',
        'codigo',
        'estado',
    ];

    public function convocatorias()
    {
        return $this->hasMany(Convocatoria::class, 'modalidad_id');
    }
}
