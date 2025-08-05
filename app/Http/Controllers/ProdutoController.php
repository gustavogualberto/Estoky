<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{


    public function produtosHome()
    {
        $search = Request('search');

        if($search){
            $produtos = Produto::where([
                ['nome_produto', 'like' , '%' . $search . '%']
            ])->get();
        }else{
            $produtos = Produto::orderBy('nome_produto')->get();
        }

        return view('site.produtos', compact('produtos', 'search'));
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();
        Produto::create($dados);
        return redirect()->route('site.produtos');
    }

    public function estoque()
    {
        return view('site.estoque');
    }

}
