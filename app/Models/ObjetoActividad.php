<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetosActividades extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'objeto_id',
        'actividad_id',
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
     * Obtiene la actividad asociada.
     */
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    /**
     * Obtiene el objeto asociado.
     */
    public function objeto()
    {
        return $this->belongsTo(Objeto::class);
    }
}
