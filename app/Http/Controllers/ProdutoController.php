<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Venda;
use App\Models\Banco;
use App\Models\Cliente;
use Carbon\Carbon;
use Facade\FlareClient\Http\Client;

//TODO: Corrigir paginação para exibir TODOS os produtos, fora da páginação atual

class ProdutoController extends Controller
{

    public function produtosHome()
    {
        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%']
            ])->orderBy('status', 'desc')->orderBy('nome_produto', 'asc')->paginate(5);
        } else {
            $produtos = Produto::orderBy('status', 'desc')->orderBy('nome_produto', 'asc')->paginate(5);
        }
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        $vendas = Venda::all();

        return view('site.produtos', compact('produtos', 'search', 'categorias', 'clientes', 'vendas'));
    }

    public function visualizar($id)
    {
        $produto = Produto::find($id);

        return view('site.visualizarProduto', compact('produto'));
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        if (isset($dados['status'])) {
            $dados['status'] = 1; //se status for marcado envia 1 pro banco
        } else { //caso contrário envia 0
            $dados['status'] = 0;
        }
    
        $dados['preco_compra'] = str_replace(',', '.', $req->preco_compra);
        $dados['preco_venda'] = str_replace(',', '.', $req->preco_venda);

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

        $vendas = Venda::all();
        $banco = Banco::all();
        $status = Banco::pluck('status');
        $saldo = Banco::latest()->value('saldo');

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

        // Mapear dias da semana para português
        $diasSemana = [
            0 => 'Dom',
            1 => 'Seg',
            2 => 'Ter',
            3 => 'Qua',
            4 => 'Qui',
            5 => 'Sex',
            6 => 'Sáb'
        ];
        $labels = $dias->map(fn($d) => $diasSemana[Carbon::parse($d)->dayOfWeek]);

        return view('site.estoque', compact('produtos', 'search', 'vendas', 'banco', 'saldo', 'status'))
            ->with([
                'labels' => $labels,
                'quantAtual' => $quantAtual,
                'estoqueIdeal' => $estoqueIdeal
            ]);
    }

    public function ativosList()
    {
        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%'],['status', 1]
            ])->orderBy('nome_produto', 'asc')->paginate(5);
        } else {
            $produtos = Produto::where('status', 1)->orderBy('nome_produto', 'asc')->paginate(5);
        }
        $categorias = Categoria::all();

        return view('site.listagem.produtosAtivos', compact('produtos', 'search', 'categorias'));
    }

    public function inativosList()
    {
        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%'],['status', 0]
            ])->orderBy('nome_produto', 'asc')->paginate(5);
        } else {
            $produtos = Produto::where('status', 0)->orderBy('nome_produto', 'asc')->paginate(5);
        }
          $categorias = Categoria::all();

        return view('site.listagem.produtosInativos', compact('produtos', 'search', 'categorias'));
    }

    public function semEstoque()
    {
        $search = Request('search');

        if ($search) {
            $produtos = Produto::where([
                ['nome_produto', 'like', '%' . $search . '%'],['quantidade', 0]
            ])->orderBy('nome_produto', 'asc')->paginate(5);
        } else {
            $produtos = Produto::where('quantidade', 0)->orderBy('nome_produto', 'asc')->paginate(5);
        }
          $categorias = Categoria::all();

        return view('site.listagem.produtosSemEstoque', compact('produtos', 'search', 'categorias'));
    }

    public function update(Request $req)
    {
        $produto = Produto::findOrFail($req->id);

        $dados = $req->all();

        if (isset($dados['status'])) {
            $dados['status'] = 1; //se status for marcado envia 1 pro banco
        } else { //caso contrário envia 0
            $dados['status'] = 0;
        }

        $produto->update($dados);

        return redirect()->route('site.produtos',  compact('produto'));
    }

     public function inativar(Request $req)
    {
        $produto = Produto::findOrFail($req->id);

        $dados = $req->all();

        $produto->update([
            'status' => 0,
        ]);

        return redirect()->route('site.produtos',  compact('produto'));
    }

    public function vender(Request $req, $id){
        $produto = Produto::findOrFail($id);
        $req -> validate([
            // 'cliente_id' => 'required',
            'quantidade' => "required|integer|min:1|max:{$produto->quantidade}"
        ]);
        $dados = $req->all();
        
        $dados['produto_id'] = $produto->id;
        $dados['data_venda'] = Carbon::now();



        $venda = Venda::create($dados);

        $produto->quantidade -= $req->quantidade;

        $banco = Banco::latest()->first();
        $banco->saldo += $produto->preco_compra;
        $banco->save();
        $produto->save();

        return redirect()->route('site.produtos',  compact('produto'));
    }

    public function cadastrarCliente(Request $req)
    {
        $dados = $req->all();

        Cliente::create($dados);
        return redirect()->route('site.produtos');

    }
}
