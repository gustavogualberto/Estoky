<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Carbon\Carbon;

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

        if (isset($dados['status'])) {
            $dados['status'] = 1; //se status for marcado envia 1 pro banco
        } else { //caso contrário envia 0
            $dados['status'] = 0;
        }

        $dados['categoria_id'] = $req->categoria_id;

        Produto::create($dados);
        return redirect()->route('site.produtos');
    }

    public function estoque()
    {

        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produtos = Produto::orderBy('nome_produto')->get();
        }

        $dias = collect();
        for ($i = 6; $i >= 0; $i--) {
            $dias->push(Carbon::now()->subDays($i)->format('Y-m-d'));
        }

        $dados = Produto::selectRaw('DATE(created_at) as dia, SUM(quantidade) as total')
            ->whereBetween('created_at', [
                Carbon::now()->subDays(6)->startOfDay(),
                Carbon::now()->endOfDay()
            ])
            ->groupBy('dia')
            ->pluck('total', 'dia');

        $quantAtual = $dias->map(fn($dia) => $dados[$dia] ?? 0);
        $estoqueIdeal = array_fill(0, 7, 10);


        return view('site.estoque', compact('produtos', 'search'))
            ->with([
                'labels' => $dias->map(fn($d) => Carbon::parse($d)->translatedFormat('D')),
                'quantAtual' => $quantAtual,
                'estoqueIdeal' => $estoqueIdeal
            ]);
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

        return view('site.listagem.produtosAtivos', compact('produtos', 'search'));
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

        return view('site.listagem.produtosInativos', compact('produtos', 'search'));
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

        return view('site.listagem.produtosSemEstoque', compact('produtos', 'search'));
    }
}
