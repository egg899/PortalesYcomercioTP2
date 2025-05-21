<?php

namespace App\Models;

use Illuminate\Databas\Eloquent\Factory\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen'];


}
