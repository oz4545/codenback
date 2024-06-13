<!-- resources/views/user_edit_form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Editar Usuario') }}</h2>
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="nombre">{{ __('Nombre') }}</label>
                <input id="nombre" type="text" name="nombre" value="{{ $user->nombre }}" required>
                @error('nombre')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="apellido">{{ __('Apellido') }}</label>
                <input id="apellido" type="text" name="apellido" value="{{ $user->apellido }}" required>
                @error('apellido')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="correo">{{ __('Correo Electrónico') }}</label>
                <input id="correo" type="email" name="correo" value="{{ $user->correo }}" required>
                @error('correo')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="foto_perfil">{{ __('Foto de Perfil') }}</label>
                <input id="foto_perfil" type="file" name="foto_perfil">
                @error('foto_perfil')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="nick">{{ __('Nick') }}</label>
                <input id="nick" type="text" name="nick" value="{{ $user->nick }}">
                @error('nick')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">{{ __('Actualizar') }}</button>
                <a href="{{ route('users.index') }}">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
@endsection
