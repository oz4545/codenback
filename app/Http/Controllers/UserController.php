<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user_register_form');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'foto_perfil' => 'image|nullable|max:2048', // Max 2MB
            'nick' => 'nullable|string|max:255',
        ]);

        // Procesar la foto de perfil si se proporcionó
        $foto_perfil = null;
        if ($request->hasFile('foto_perfil')) {
            $foto_perfil = $request->file('foto_perfil')->store('public/fotos_perfil');
        }

        // Crear el nuevo usuario en la base de datos
        $user = new User([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'correo' => $request->input('correo'),
            'password' => bcrypt($request->input('password')),
            'foto_perfil' => $foto_perfil,
            'nick' => $request->input('nick'),
        ]);
        $user->save();

        // Autenticar al usuario después de registrarse
        Auth::loginUsingId($user->id);

        // Redireccionar al usuario a la página de inicio
        return redirect()->route('inicio')->with('success', '¡Usuario registrado correctamente!');
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('users_index', compact('users'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('user_edit_form', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:users,correo,' . $user->id,
            'foto_perfil' => 'image|nullable|max:2048', // Max 2MB
            'nick' => 'nullable|string|max:255',
        ]);

        // Actualizar los datos del usuario
        $user->nombre = $request->input('nombre');
        $user->apellido = $request->input('apellido');
        $user->correo = $request->input('correo');
        $user->nick = $request->input('nick');

        if ($request->hasFile('foto_perfil')) {
            $foto_perfil = $request->file('foto_perfil')->store('public/fotos_perfil');
            $user->foto_perfil = $foto_perfil;
        }

        $user->save();

        // Redireccionar al usuario a la página de inicio
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        // Redireccionar al usuario a la página de inicio
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}

