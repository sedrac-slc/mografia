<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>conteudo\relatorios</title>
</head>

<body>
    @php
        $div = 'margin:auto;';
        $enfase = 'font-weight:bold;';
        $default = 'font-family:sans-serif;';
        $titulo = 'border-bottom:1px solid #ccc;';
        $forTit = 'margin-left:30px;';
        $forSubtit = 'margin-left:40px;';
    @endphp
    <section class="bg-dark" style="{{ $div }}">
        <h2 style="{{ $default }} {{ $titulo }}">Conteudo</h2>
        @foreach ($titulos as $titulo)
            <p style="{{ $default }} {{ $forTit }}">
                <span style="{{ $enfase }}">{{ $titulo->prioridade }}.</span>
                {{ $titulo->descricao }}
            </p>
            @foreach (DB::table('paragrafo_titulos')->where('titulo_id', $titulo->id)->get()
    as $titConteudo)
                <p style="{{ $default }} {{ $forSubtit }}">
                    {{ $titConteudo->descricao }}
                </p>
            @endforeach
            @foreach (DB::table('subtitulos')->where('titulo_id', $titulo->id)->get() as $subtitulo)
                <p style="{{ $default }} {{ $forSubtit }}">
                    <span
                        style="{{ $enfase }}">{{ $titulo->prioridade }}.{{ $subtitulo->prioridade }}</span>
                    {{ $subtitulo->descricao }}
                </p>
                @foreach (DB::table('paragrafo_subtitulos')->where('subtitulo_id',$subtitulo->id)->get() as $subtitConteudo)
                    <p style="{{ $default }} {{ $forSubtit }}">
                        {{ $subtitConteudo->descricao }}
                    </p>
                @endforeach
            @endforeach
        @endforeach
    </section>

    <!-- JavaScript Bundle with Popper -->

</body>

</html>
