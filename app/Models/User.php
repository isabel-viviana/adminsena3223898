<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function persona()
    {
        return $this->hasOne(Persona::class, 'user_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'user_id');
    }
}
