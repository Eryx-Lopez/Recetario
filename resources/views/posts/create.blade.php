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
    <h1>aqui se crearia una receta</h1>

    <form action="/post" method="POST">
    @csrf
    <!-- Datos de la receta -->
    <label for="nombre">Nombre de la receta</label>
    <input type="text" name="nombre" required>

    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" required>

    <label for="instrucciones">Instrucciones</label>
    <input type="text" name="instrucciones" required>

    <!-- Ingrediente 1 -->
    <div>
        <select name="ingredientes[0][id_ingrediente]" required>
            @foreach ($ingredientes as $ingrediente)
                <option value="{{ $ingrediente->id_ingrediente }}">{{ $ingrediente->nombre }}</option>
            @endforeach
        </select>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="ingredientes[0][cantidad]" required>

        <label for="unidad">Unidad</label>
        <input type="text" name="ingredientes[0][unidad]" required>
    </div>

    <div>
        <select name="ingredientes[1][id_ingrediente]" required>
            @foreach ($ingredientes as $ingrediente)
                <option value="{{ $ingrediente->id_ingrediente }}">{{ $ingrediente->nombre }}</option>
            @endforeach
        </select>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="ingredientes[1][cantidad]" required>

        <label for="unidad">Unidad</label>
        <input type="text" name="ingredientes[1][unidad]" required>
    </div>

    <!-- Puedes repetir bloques de ingredientes según el número que desees -->
    
    <button type="submit">Subir receta</button>
</form>
    <a href="/post">Regresar</a>
</body>
</html>