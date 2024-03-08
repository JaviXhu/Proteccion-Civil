<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personal';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'carne', // Cambiado el nombre del campo
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
        'carne' => 'boolean', // Cambiado el nombre del campo
    ];

    /**
     * Obtiene al usuario dueño del personal.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
