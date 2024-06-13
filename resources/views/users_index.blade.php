<!-- resources/views/users_index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Foto de Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                        <td>{{ $user->correo }}</td>
                        <td>
                            @if ($user->foto_perfil)
                                <img src="{{ asset('storage/' . $user->foto_perfil) }}" alt="Foto de perfil" style="max-width: 100px;">
                            @else
                                Sin foto de perfil
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
