<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'titulo' => '¡Lanzamos nuestra nueva app!',
            'contenido' => 'Hoy presentamos una actualización',
            'autor' => 'Equipo de Desarrollo',
            'imagen' => 'nueva-app.jpg',
        ]);

        Blog::create([
            'titulo' => 'Consejos para aprovechar el producto',
            'contenido' => 'Estos consejos te ayudaran a sacarle el máximo provecho...',
            'autor' => 'Soporte Técnico',
            'imagen' => 'soporte-tecnico.jpg',

        ]);
    }
}
