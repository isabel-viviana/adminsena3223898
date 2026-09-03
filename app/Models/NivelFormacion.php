<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelFormacion extends Model
{
    use HasFactory;

    protected $table = 'niveles_formacion';

    protected $fillable = [
        'nombre',
        'codigo',
        'duracion_meses_estimada',
        'estado',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'nivel_id');
    }
}
