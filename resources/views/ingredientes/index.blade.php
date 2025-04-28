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
    <h1>Aqui van los ingredientes</h1>
    <a href="/post">Regresar</a>
    <p>
        <b>Ingredientes</b>
        <ul>
            @foreach($ingredientes as $ingrediente)
            <li>
                {{$ingrediente->nombre}}
            </li>
            @endforeach
        </ul>
    </p>
    <a href="/add-ingredient">Añadir ingrediente</a>
</body>
</html>