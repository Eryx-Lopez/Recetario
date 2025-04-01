<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
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
        Schema::create('ingredientes_receta', function (Blueprint $table) {
            // Define the columns for the composite primary key
            $table->unsignedBigInteger('id_receta'); // This creates the id_receta column
            $table->unsignedBigInteger('id_ingrediente'); // This creates the id_ingrediente column
        
            // Define the composite primary key
            $table->primary(['id_receta', 'id_ingrediente']);
        
            // Define additional columns
            $table->float('cantidad');
            $table->string('unidad', 20);
        
            // Define foreign keys
            $table->foreign('id_receta')->references('id_receta')->on('recetas')->onDelete('cascade');
            $table->foreign('id_ingrediente')->references('id_ingrediente')->on('ingredientes')->onDelete('cascade');
        });
        
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
