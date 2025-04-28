<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recetas;
use App\Models\ingredientes;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function create()
    {
        //Para que pueda acceder a los ingredientes, ya que estan en otra tabla
        $ingredientes = ingredientes::all();
        return view('posts.create', ['ingredientes' => $ingredientes]);
    }
    public function show($post)
    {
       // $post = recetas::all();
        $post = recetas::with('ingredientes')->findOrFail($post); //La carga WITH los ingredientes omg genius
        return view('posts.show', compact('post'));
    }
    public function index()
    {
        $recetas = recetas::all();

        return view('posts.index',['recetas' => $recetas]);
    }

    public function store(Request $request)
{
    // Crear la receta
    $receta = new Recetas();
    $receta->nombre = $request->input('nombre');
    $receta->descripcion = $request->input('descripcion');
    $receta->instrucciones = $request->input('instrucciones');
    $receta->save();

    // Asociar los ingredientes a la receta
    $ingredientesData = $request->input('ingredientes');
    foreach ($ingredientesData as $ingrediente) {
        $receta->ingredientes()->attach($ingrediente['id_ingrediente'], [
            'cantidad' => $ingrediente['cantidad'],
            'unidad' => $ingrediente['unidad'],
        ]);
    }

    return redirect('/post')->with('success', '¡Receta guardada exitosamente!');
}

    public function searchRecipe(Request $request){
        $search = $request->input('search');

        $ingredientes = ingredientes::where('nombre', 'LIKE', '%' . $search . '%')->get();

        if($ingredientes->isEmpty()){
            return redirect()->back()->with('error', 'No se encontraron ingredientes que coincidan con la búsqueda.');
        }

        $recetas = collect();

        foreach ($ingredientes as $ingrediente) {
            $recetas = $recetas->merge($ingrediente->recetas);
        }
    
        $recetas = $recetas->unique();

        return view('posts.results',['recetas' => $recetas, 'ingrediente'=> $ingrediente]);

    }
}
