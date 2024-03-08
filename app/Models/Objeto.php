<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;
    
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $table = 'objetos';
    protected $fillable = [
        'nombre',
        'tipo',
        'cantidad',
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
        //
    ];

    /**
     * Obtiene al usuario dueño del objeto.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
