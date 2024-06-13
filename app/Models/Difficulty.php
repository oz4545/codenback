<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'completado',
        'puntaje_completado',
        'usuario_id'
    ];

    /**
     * Un `Difficulty` pertenece a un `User`.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    /**
     * Un `Difficulty` puede tener varios `Levels`.
     */
    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    /**
     * Un `Difficulty` puede tener varios `Forms`.
     */
    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    /**
     * Un `Difficulty` puede tener varios `Questions`.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Un `Difficulty` puede tener varios `Answers`.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Un `Difficulty` puede tener varios `Users`.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Un `Difficulty` tiene un `Ranking`.
     */
    public function ranking()
    {
        return $this->hasOne(Ranking::class);
    }

    /**
     * Un `Difficulty` tiene un `Progress`.
     */
    public function progress()
    {
        return $this->hasOne(Progress::class);
    }
}
