<?php

namespace App\Http\Controllers;

use App\Models\ingredientes;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function ingrediente(){
        $ingredientes = ingredientes::all();
        return view('ingredientes.index',['ingredientes' => $ingredientes]);
    }

    public function add(){
        return view('ingredientes.add');
    }

    public function store(Request $request)
    {
        // Receta
        $ingredientes = new ingredientes();
        $ingredientes->nombre = $request->input('nombre');
        $ingredientes->save();
    
        return redirect('/ingredientes');
    }
}
