<?php

namespace App\Http\Controllers;

use App\Models\ingredientes as ModelsIngredientes;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function search(Request $request){
        $term = $request->query('term'); //Obtener input term
        $ingredients = ModelsIngredientes::where('nombre', 'LIKE', '%' . $term . '%')->get(['id_ingrediente', 'nombre']); //Regresa los ingredientes que hagan match
        return response()->json($ingredients); //Devuelve un JSON, veamos pa q
    }
}
