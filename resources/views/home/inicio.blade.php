<!-- resources/views/inicio.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Bienvenido a la Página de Inicio</h1>
        <a href="{{ route('quiz.show', ['formId' => 1, 'questionId' => 1]) }}" class="btn btn-primary">Ir al formulario 1</a>

        <!-- Botón de logout -->
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
@endsection
