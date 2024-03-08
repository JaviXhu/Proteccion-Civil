<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coches extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */

     protected $table = 'coches';
    protected $fillable = [
        'marca',
        'modelo',
        'fecha_gasolina', // Cambiado de 'fecha-gasolina'
        'fecha_itv',      // Cambiado de 'fecha-itv'
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
        'fecha_gasolina' => 'datetime', // Cambiado de 'Fecha_Gasolina'
        'fecha_itv' => 'datetime',       // Cambiado de 'Fecha_ITV'
    ];

    /**
     * Obtiene al usuario que creó el coche.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
