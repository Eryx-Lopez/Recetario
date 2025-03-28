<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IngredientesReceta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Definir la clave primaria compuesta
        $table->primary(['id_receta', 'id_ingrediente']);
        $table->float('cantidad');
        $table->string('unidad', 20);

        // Definir las claves foráneas
        $table->foreign('id_receta')->references('id')->on('recetas')->onDelete('cascade');
        $table->foreign('id_ingrediente')->references('id')->on('ingredientes')->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('ingredientes_receta');
    }
}
