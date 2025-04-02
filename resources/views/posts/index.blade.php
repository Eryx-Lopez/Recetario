<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>aqui van todos las recetas</h1>
    
    <ul>
        @foreach ($recetas as $recetas)
            <li>
                <a href="/post/{{$recetas->id_receta}}">
                    {{ $recetas->nombre }}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="/create">Subir receta</a>
    <a href="/ingredientes">Ingredientes</a>
</body>
</html>