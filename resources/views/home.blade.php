<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario de Sobras</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Recetario de Sobras</h1>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/post">Ver Recetas</a></li>
            <li><a href="/create">Subir receta</a></li>
            <li><a href="/ingredientes">Ver Ingredientes</a></li>
            <li><a href="/add-ingredient">Agregar un ingrediente</a></li>
        </ul>
    </nav>

    <form method="GET" action="{{ route('searchRecipe') }}">
        <input type="text" name="search" placeholder="Buscar ingrediente..." required>
        <button type="submit">Buscar</button>
    </form>

    <div id="resultados">
        @if(isset($recetas))
            <h2>Resultados:</h2>
            <ul>
                @forelse ($recetas as $receta)
                    <li>{{ $receta->nombre }}</li>
                @empty
                    <li>No se encontraron recetas.</li>
                @endforelse
            </ul>
        @endif
    </div>
    
    <footer>
        <p>Recetario de Sobras &copy; 2020</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>