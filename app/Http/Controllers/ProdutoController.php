<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{


    public function produtosHome()
    {
        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produtos = Produto::orderBy('nome_produto')->get();
        }
        $categorias = Categoria::all();
        
        return view('site.produtos', compact('produtos', 'search', 'categorias'));
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        if(isset($dados['status'])){
            $dados['status'] = 1; //se status for marcado envia 1 pro banco
        }else{ //caso contrário envia 0
            $dados['status']= 0;
        }

        $dados['categoria_id'] = $req -> categoria_id;

        Produto::create($dados);
        return redirect()->route('site.produtos');
    }

    public function estoque()
    {
        return view('site.estoque');
    }

    public function ativosList()
    {
        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produtos = Produto::orderBy('nome_produto')->get();
        }

        return view ('site.listagem.produtosAtivos', compact('produtos', 'search'));
    }

     public function inativosList()
    {
        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produtos = Produto::orderBy('nome_produto')->get();
        }

        return view ('site.listagem.produtosInativos', compact('produtos', 'search'));
    }

    public function semEstoque()
    {
        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produtos = Produto::orderBy('nome_produto')->get();
        }

        return view ('site.listagem.produtosSemEstoque', compact('produtos', 'search'));
    }
}
