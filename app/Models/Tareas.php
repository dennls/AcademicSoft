<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;
    protected $table = 'tareas';

    protected $fillable = [
        'asignacion_id',
        'descripcion',
        'nota',
        'entrega',
    ];

    public function asignacion()
    {
        return $this->belongsTo(Asignaciones::class, 'asignacion_id');
    }
}
