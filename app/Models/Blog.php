<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';      // Le decís a Laravel qué tabla usar (útil si no sigue la convención)
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'resumen', 'contenido', 'autor', 'imagen', 'categoria'];
    protected $casts = [
        'fecha' => 'datetime',
    ];

}
