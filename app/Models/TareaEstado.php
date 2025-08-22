<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TareaEstado extends Model
{
    protected $table = 'tareas_estados';
    protected $primaryKey = 'estado_id';

    protected $fillable = [
        'estado_titulo',
    ];

    // Relación con tareas
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'estado_id', 'estado_id');
    }
}
