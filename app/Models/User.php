<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'password',
        'foto_perfil',
        'nick',
        'puntaje',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relaciones del modelo.
     */

    public function forms()
    {
        return $this->hasMany(Form::class, 'usuario_id');
    }

    public function difficulties()
    {
        return $this->hasMany(Form::class, 'usuario_id');
    }

    public function levels()
    {
        return $this->hasMany(Level::class, 'usuario_id');
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswers::class, 'usuario_id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'usuario_id');
    }

    public function rankings()
    {
        return $this->hasOne(Ranking::class, 'usuario_id');
    }
}
