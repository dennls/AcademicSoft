<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
    use HasFactory;
    protected $table ='asignaciones';
    protected $fillable = [
        'usuario_id',
        'curso_id',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'importe',
        'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
