<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <title>Document</title>
</head>
<body>
    <h1>aqui se crearia una receta</h1>

    <form action="/post" method="POST" class="space-y-4">
            @csrf
            <!-- DE LA TABLA RECETAS -->
            <label for="nombre">Nombre de la receta</label>
            <input type="text" name="nombre">

            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion">
            
            <label for="instrucciones">Instrucciones</label>
            <input type="text" name="instrucciones">

            <!-- AUTOCOMPLETAR INGREDIENTE (gracias copilot)-->
            <label for="ingrediente">Ingredientes</label>
            <input type="text" id="ingrediente-input" placeholder="Ingrese un ingrediente">
            <ul id="lista-ingredientes"></ul>

            <input type="hidden" name="ingredientes_ids[]" id="ingredientes-ids">

            <label for="ingrediente_nuevo">Agregar Ingrediente</label>
            <input type="text" name="ingrediente-nuevo" id="ingrediente-nuevo">

            <button type="submit">Subir receta</button>
        </form>
    <a href="/post">Regresar</a>
</body>
</html>