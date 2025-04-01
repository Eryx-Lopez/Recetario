<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredientes extends Model
{
    protected $table = 'ingredientes';
    protected $primaryKey = 'id_ingrediente';

    public function recetas()
    {
        return $this->belongsToMany(recetas::class, 'ingredientes_receta', 'id_ingrediente', 'id_receta')
                    ->withPivot('cantidad', 'unidad');
    }
}
