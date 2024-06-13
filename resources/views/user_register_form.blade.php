<!-- resources/views/user_register_form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Registro de Usuario') }}</h2>
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="nombre">{{ __('Nombre') }}</label>
                <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="apellido">{{ __('Apellido') }}</label>
                <input id="apellido" type="text" name="apellido" value="{{ old('apellido') }}" required>
                @error('apellido')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="correo">{{ __('Correo Electrónico') }}</label>
                <input id="correo" type="email" name="correo" value="{{ old('correo') }}" required>
                @error('correo')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="contraseña">{{ __('Contraseña') }}</label>
                <input id="contraseña" type="password" name="password" required>
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="foto_perfil">{{ __('Foto de Perfil') }}</label>
                <input id="foto_perfil" type="file" name="foto_perfil" accept="image/*">
                @error('foto_perfil')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="nick">{{ __('Nick') }}</label>
                <input id="nick" type="text" name="nick" value="{{ old('nick') }}">
                @error('nick')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">{{ __('Registrar') }}</button>
                <a href="{{ route('users.index') }}">{{ __('Ver Usuarios') }}</a>
            </div>
        </form>
    </div>
@endsection
