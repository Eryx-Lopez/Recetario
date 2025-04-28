<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recetas extends Model
{
    protected $table = 'recetas';
    protected $primaryKey = 'id_receta';

    public function ingredientes()
    {
        return $this->belongsToMany(ingredientes::class, 'ingredientes_receta', 'id_receta', 'id_ingrediente')
                    ->withPivot('cantidad', 'unidad');
    }
}
