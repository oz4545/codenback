<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'formulario',
        'nombre_pregunta',
        'descripcion',
        'type',
        'completado',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'formulario');
    }

    public function answers()
{
    return $this->hasMany(Answer::class, 'pregunta_id');
}


    public function userAnswers()
    {
        return $this->hasMany(UserAnswers::class, 'pregunta_id');
    }
}
