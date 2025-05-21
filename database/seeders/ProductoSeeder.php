<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;


class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'ElectroPods',
            'descripcion' => 'Auriculares inalámbricos con cancelación de ruido, Bluetooth 5.3 y 30 horas de batería.',
            'precio' => 129.99,
            'imagen' => 'electropods.jpg',
        ]);
    }
}
