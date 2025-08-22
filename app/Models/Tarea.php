<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $primaryKey = 'tareas_id';

    protected $fillable = [
        'tareas_titulo',
        'tareas_descripcion',
        'estado_id',
        'user_id', 
        'tareas_fecha_limite', 
        'tareas_notas',       
    ];

    public function estado()
    {
        return $this->belongsTo(TareaEstado::class, 'estado_id', 'estado_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
