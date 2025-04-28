<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Landing page
Route::get('/', [HomeController::class, 'home']);

//Ver todas la recetas
Route::get('/post',[PostController::class,'index']);

//Crear una receta
Route::get('/create',[PostController::class,'create']);

//Ver una sola receta
Route::get('/post/{post}',[PostController::class,'show']);

//Ver todos los ingredientes
Route::get('/ingredientes',[IngredientController::class,'ingrediente']);

//Buscar ingredientes
Route::get('/search', [PostController::class, 'searchRecipe'])->name('searchRecipe');

//Agregar un ingrediente
Route::get('/add-ingredient', [IngredientController::class,'add']);


//Metodo para agregar recetas
Route::post('/post', [PostController::class, 'store']);

//Metodo para agregar ingredientes
Route::post('/add', [IngredientController::class, 'store']);


