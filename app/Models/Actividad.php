<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'actividades';
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'municipio',
        'calle',
        'tipo',
        'horas',
        'fecha',
        'usuario_id',
    ];

    /**
     * Los atributos que deben ser ocultados en los arreglos.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * Los atributos que se deben convertir a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'datetime',
    ];

    /**
     * Obtiene al usuario organizador de la actividad.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
