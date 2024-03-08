<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\Request;

class ObjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objetos = Objeto::all();
        return view('objetos.index', ['objetos' => $objetos]);
    }

    public function create()
    {
        return view('objetos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'tipo' => 'required|string',
            'cantidad' => 'required|integer',
            'usuario_id' => 'required|exists:users,id'
            // Otras validaciones según tus requisitos
        ]);

        $objeto = Objeto::create($request->all());
        return response()->json($objeto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Objeto $objeto)
    {
        return response()->json($objeto);
    }


    public function edit(Objeto $objeto)
    {
        return view('objetos.edit', ['objeto' => $objeto]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Objeto $objeto)
    {
        $request->validate([
            'nombre' => 'string',
            'tipo' => 'string',
            'cantidad' => 'integer',
            'usuario_id' => 'exists:users,id'
            // Otras validaciones según tus requisitos
        ]);

        $objeto->update($request->all());
        return response()->json($objeto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objeto $objeto)
    {
        $objeto->delete();
        return response()->json(null, 204);
    }
}
