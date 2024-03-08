<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personales = Personal::all();
        return view('personal.index', ['personales' => $personales]);
    }
    

    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email|unique:personal,email',
            'telefono' => 'required|string',
            'carne' => 'required|boolean',
            // Otras validaciones según tus requisitos
        ]);
    
        $personal = new Personal([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'carne' => $request->input('carne') ?? false, // Si no se proporciona, establece el valor predeterminado en false
            'usuario_id' => Auth::id()
        ]);
        
        
    
        $personal->save();
    
        return redirect()->route('personal.index')->with('success', 'Personal creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        return response()->json($personal);
    }


    public function edit(Personal $personal)
    {
        return view('personal.edit', ['personal' => $personal]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'nombre' => 'string',
            'apellidos' => 'string',
            'email' => 'email|unique:personal,email,' . $personal->id,
            'telefono' => 'string',
            'permiso_conducir' => 'boolean',
            'usuario_id' => 'exists:users,id'
            // Otras validaciones según tus requisitos
        ]);

        $personal->update($request->all());
        return redirect()->route('personal.index')->with('success', 'Personal actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $personal)
    {
        $personal->delete();
        return response()->json(null, 204);
    }
}
