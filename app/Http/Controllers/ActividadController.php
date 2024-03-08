<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::all();
        return view('actividades.index', ['actividades' => $actividades]);
    }

    public function create()
    {
        return view('actividades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'municipio' => 'required|string',
            'calle' => 'required|string',
            'tipo' => 'required|string',
            'horas' => 'required|integer',
            'fecha' => 'required|date',
            'usuario_id' => 'required|exists:users,id'
        ]);

        $actividad = Actividad::create($request->all());
        return response()->json($actividad, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Actividad $actividad)
    {
        return response()->json($actividad);
    }

    public function edit(Actividad $actividad)
    {
        return view('Actividad.edit', ['actividad' => $actividad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'nombre' => 'string',
            'municipio' => 'string',
            'calle' => 'string',
            'tipo' => 'string',
            'horas' => 'integer',
            'fecha' => 'date',
            'usuario_id' => 'exists:users,id'
        ]);

        $actividad->update($request->all());
        return response()->json($actividad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return response()->json(null, 204);
    }
}
