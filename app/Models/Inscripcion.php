<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $fillable = [
        'persona_id',
        'user_id',
        'convocatoria_id',
        'status',
        'enrolled_at',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class);
    }

    public function apprentice()
    {
        return $this->hasOne(Apprentice::class, 'inscripcion_id');
    }
}
