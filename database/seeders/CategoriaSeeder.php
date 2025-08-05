<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = ['Perfumaria', 'Maquiagem', 'Skin care', 'Corporal', 'Cabelo'];

        foreach ($categorias as $cat) {
            Categoria::create(['categoria' => $cat]);
        }
    }
}
