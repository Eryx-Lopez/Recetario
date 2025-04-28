<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/post">Ver Recetas</a></li>
            <li><a href="/create">Subir receta</a></li>
            <li><a href="/ingredientes">Ver Ingredientes</a></li>
            <li><a href="/add-ingredient">Agregar un ingrediente</a></li>
        </ul>
    </nav>
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