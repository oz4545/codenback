<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'contenido',
        'dificulty_id',
        'usuario_id',
        'completado',
        'puntaje_completado',
    ];

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class, 'dificulty_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function forms()
    {
        return $this->hasMany(Form::class, 'nivel');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'nivel_id');
    }
}
