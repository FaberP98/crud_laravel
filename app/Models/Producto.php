<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Atributos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'imagen', // Si estás guardando imágenes
    ];
}
