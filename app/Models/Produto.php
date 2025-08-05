<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_produto',
        'imagem',
        'categoria',
        'quantidade',
        'preco_compra',
        'preco_venda',
        'data_compra',
        'data_venda',
        'status',
        'fornecedor',
        'codigo_de_barras',
    ];
}
