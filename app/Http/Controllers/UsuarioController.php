<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('usuarios.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $user = Auth::user();

            if ($user->rol === 'admin') {
                // Redirigir al panel de administración
                return redirect()->route('usuarios.admin.dashboard');
            } else {
                // Redirigir al panel del voluntario
                return redirect()->route('usuarios.voluntario.dashboard');
            }
        }

        // Autenticación fallida
        return back()->withErrors([
            'email' => 'Sus credenciales no son correctas, compruebe sus datos.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }




    public function create()
    {
        return view('usuarios.registro');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email|unique:users,email', // Cambiado a 'users' en lugar de 'usuarios'
            'password' => 'required|string|min:6',
            // Otras validaciones según tus requisitos
        ]);

        $usuario = User::create($request->all()); // Cambiado a User::create en lugar de Usuario::create
        return response()->json($usuario, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'nombre' => 'string',
            'email' => 'email|unique:usuarios,email,' . $usuario->id,
            'password' => 'string|min:6',
            // Otras validaciones según tus requisitos
        ]);

        $usuario->update($request->all());
        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204);
    }
}
