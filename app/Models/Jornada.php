<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    use HasFactory;

    protected $table = 'jornadas';

    protected $fillable = [
        'nombre',
        'codigo',
        'estado',
    ];

    public function convocatorias()
    {
        return $this->hasMany(Convocatoria::class, 'jornada_id');
    }
}
