<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'pregunta_id',
        'respuesta_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'pregunta_id');
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'respuesta_id');
    }
}
