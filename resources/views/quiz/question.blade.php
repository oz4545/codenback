<!DOCTYPE html>
<html>
<head>
    <title>Pregunta del Formulario</title>
</head>
<body>
    <h1>{{ $form->nombre }}</h1>
    <h2>{{ $question->nombre_pregunta }}</h2>
    <p>{{ $question->descripcion }}</p>

    <form action="{{ route('quiz.validate', ['formId' => $form->id, 'questionId' => $question->id]) }}" method="POST">
        @csrf
        @if($question->type == 'unica_respuesta')
            @foreach($answers as $answer)
                <div>
                    <input type="radio" name="answer" value="{{ $answer->id }}">
                    <label>{{ $answer->nombre }}</label>
                </div>
            @endforeach
        @endif

        <button type="submit">Enviar</button>
    </form>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</body>
</html>
