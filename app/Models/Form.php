<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nivel',
        'descripcion',
        'completado',
        'usuario_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'nivel');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'formulario');
    }
}
