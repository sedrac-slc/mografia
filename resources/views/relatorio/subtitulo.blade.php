<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>subtitulos\relatorios</title>
</head>

<body>
@php
   $div="margin:auto;";
   $enfase="font-weight:bold;";
   $default="font-family:sans-serif;";
   $titulo="border-bottom:1px solid #ccc;";
   $elementos="margin-left:30px;border:1px solid #ccc;padding:10px;border-radius:5px;";
@endphp
    <section class="bg-dark" style="{{ $div }}">
        <h2 style="{{ $default }} {{ $titulo }}">Titulos</h2>
        @foreach ($subtitulos as $ubtitulo)
            <p style="{{ $default }} {{ $elementos }}">
                <span style="{{ $enfase }}">{{ $titulo->prioridade }}.{{ $subtitulo->prioridade }}</span>
                {{ $subtitulo->descricao }}
            </p>
        @endforeach
    </section>

    <!-- JavaScript Bundle with Popper -->

</body>

</html>
