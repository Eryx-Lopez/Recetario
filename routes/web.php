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

Route::get('/', [HomeController::class, 'home']);
Route::get('/post',[PostController::class,'index']);
Route::get('/create',[PostController::class,'create']);
Route::get('/post/{post}',[PostController::class,'show']);
Route::get('/ingredientes',[IngredientController::class,'ingrediente']);

//Agregar cosas
Route::post('/post', [PostController::class, 'store']);
Route::post('/add', [IngredientController::class, 'store']);


Route::get('/add-ingredient', [IngredientController::class,'add']);

