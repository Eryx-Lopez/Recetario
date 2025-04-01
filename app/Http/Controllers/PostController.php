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
        // Save the recipe
        $recetas = new Recetas();
        $recetas->nombre = $request->input('nombre');
        $recetas->descripcion = $request->input('descripcion');
        $recetas->instrucciones = $request->input('instrucciones');
        $recetas->save();
    
        // Handle selected ingredients
        $ingredientesIds = explode(',', $request->input('ingredientes_ids', '')); // Split IDs
        foreach ($ingredientesIds as $idIngrediente) {
            DB::table('ingredientes_receta')->insert([
                'id_receta' => $recetas->id_receta,
                'id_ingrediente' => $idIngrediente,
                'cantidad' => 0, // Default quantity
                'unidad' => '', // Default unit
            ]);
        }
    
        // Handle new ingredient
        $nuevoIngrediente = $request->input('nuevo_ingrediente');
        if ($nuevoIngrediente) {
            $ingrediente = new Ingredientes();
            $ingrediente->nombre = $nuevoIngrediente;
            $ingrediente->save();
    
            DB::table('ingredientes_receta')->insert([
                'id_receta' => $recetas->id_receta,
                'id_ingrediente' => $ingrediente->id_ingrediente,
                'cantidad' => 0,
                'unidad' => '',
            ]);
        }
    
        return redirect('/post');
    }
}
