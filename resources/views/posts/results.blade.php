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
    <h1>Resultados de la búsqueda</h1>
    <a href="/">Regresar</a>
    <p>
        <b>{{ $ingrediente->nombre }}</b>
    </p>
    <ul>
        @forelse ($recetas as $receta)
            <li>{{ $receta->nombre }}</li>
        @empty
            <li>No se encontraron recetas.</li>
        @endforelse
    </ul>
</body>
</html>