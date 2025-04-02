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
        // Receta
        $recetas = new Recetas();
        $recetas->nombre = $request->input('nombre');
        $recetas->descripcion = $request->input('descripcion');
        $recetas->instrucciones = $request->input('instrucciones');
        $recetas->save();
    
        return redirect('/post');
    }
}
