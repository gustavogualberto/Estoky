<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        Produto::create([
            'nome_produto' => 'Perfume Exemplo',
            'categoria_id' => 1,
            'quantidade' => 10,
            'status' => 1,
            // outros campos que você tiver...
        ]);

        // Pode adicionar vários produtos aqui
    }
}
