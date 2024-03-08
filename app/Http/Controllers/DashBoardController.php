<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class DashboardController extends Controller
{
    /**
     * Muestra el panel de administración.
     */
    public function admin()
    {
        // Aquí puedes agregar la lógica para el panel de administración
        return view('usuarios.admin.dashboard');
    }

    /**
     * Muestra el panel del voluntario.
     */
    public function voluntario()
    {
        // Obtener las actividades disponibles
        $actividades = Actividad::all();

        // Retornar la vista con las actividades
        return view('usuarios.voluntario.dashboard', compact('actividades'));
    }
}
