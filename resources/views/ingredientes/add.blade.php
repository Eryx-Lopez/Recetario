<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/autocomplete.js') }}"></script>
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
    <h1>aqui se agregan ingredientes</h1>

    <form action="/add" method="POST" class="space-y-4">
            @csrf
            <!-- DE LA TABLA RECETAS -->
            <label for="nombre">Ingrediente</label>
            <input type="text" name="nombre">

            <button type="submit">Agregar ingrediente</button>
        </form>
    <a href="/ingredientes">Regresar</a>
</body>
</html>