<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'user_id',
        'tipo_documento',
        'numero_documento',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'genero',
        'correo_contacto',
        'telefono',
        'direccion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function docente()
    {
        return $this->hasOne(Teacher::class, 'persona_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'persona_id');
    }

    public function aprendices()
    {
        return $this->hasMany(Apprentice::class, 'persona_id');
    }

    public function getNombreCompletoAttribute()
    {
        return trim("{$this->primer_nombre} {$this->segundo_nombre} {$this->primer_apellido} {$this->segundo_apellido}");
    }
}
