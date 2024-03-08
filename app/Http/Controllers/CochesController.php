<?php

namespace App\Http\Controllers;

use App\Models\Coches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CochesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coches = Coches::all();
        return view('coches.index', ['coches' => $coches]);
    }
    

    public function create()
    {
        return view('coches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'fecha_gasolina' => 'nullable|date',
            'fecha_itv' => 'nullable|date',
            // Otras validaciones según tus requisitos
        ]);
    
        $coche = new Coches([
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'fecha_gasolina' => $request->input('fecha_gasolina'),
            'fecha_itv' => $request->input('fecha_itv'),
            'usuario_id' => Auth::id()
        ]);
        
        $coche->save();
    
        return redirect()->route('coches.index')->with('success', 'Coche creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coches $coche)
    {
        return response()->json($coche);
    }


    public function edit(Coches $coche)
    {
        return view('coches.edit', ['coche' => $coche]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coches $coche)
    {
        $request->validate([
            'marca' => 'string',
            'modelo' => 'string',
            'fecha_gasolina' => 'nullable|date',
            'fecha_itv' => 'nullable|date',
            // Otras validaciones según tus requisitos
        ]);

        $coche->update($request->all());
        return redirect()->route('coches.index')->with('success', 'Coche actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coches $coche)
    {
        $coche->delete();
        return response()->json(null, 204);
    }
}
