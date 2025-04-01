<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Aqui va la receta individual</h1>
    <a href="/post">Regresar</a>
    <h1>{{$post->nombre}}</h1>
    <p>
        <b>Descripcion</b> {{$post->descripcion}}
    </p>
    <p>
        <b>Instrucciones</b> {{$post->instrucciones}}
    </p>
    <p>
        <b>Ingredientes</b>
        <ul>
            @foreach ($post-> ingredientes as $ingrediente)
            <li>
                {{$ingrediente->nombre}} - {{$ingrediente->pivot->cantidad}} {{$ingrediente->pivot->unidad}}
            </li>
            @endforeach
        </ul>
    </p>
</body>
</html>