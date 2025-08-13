<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'produto_id',
        'quantidade',
        'data_venda',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}
