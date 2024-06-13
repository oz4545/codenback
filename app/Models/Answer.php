<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'pregunta_id', // Agregar 'pregunta_id'
        'respuesta',
    ];

    public function question()
{
    return $this->belongsTo(Question::class, 'pregunta_id');
}

    public function userAnswers()
    {
        return $this->hasMany(UserAnswers::class, 'respuesta_id');
    }
}
