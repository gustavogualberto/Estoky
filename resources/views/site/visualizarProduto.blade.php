@extends('welcome')

@section('conteudo')
    <div class="container mt-5 mb-2 bg-white p-4 rounded shadow-sm">
        <div class="row align-items-start">
            <div class="col-4 col-md-12 col-lg-6 ">
                <img src="{{ asset('/img/IMG_20241118_192023 (1) (2).jpg') }}" alt="" class="w-100 rounded-3">
            </div>
            <div class="col ms-5">
                <div class="d-flex align-items-center gap-3 ">
                    <h1 class="mb-0 produtoTitulo fw-normal">{{ $produto->nome_produto }}</h1>
                    {!! $produto->status == 0 ? '<span class="btn-inativo bg-danger">Inativo</span>' : '<span class="btn-ativo bg-success">Ativo</span>' !!}
                </div>
                <h6 class="corpo h-50 produtoSubInfo">{{ $produto->fornecedor }} - {{ $produto->codigo_de_barras }}</h6>
                <div class="linha mt-0 mb-3"></div>
                <h4 class="produtoSubTitulo text-dark">
                    Quantidade
                </h4>

                <p class="corpo ">{{ $produto->quantidade }}</p>
                <div class="row">
                    <div class="col">
                        <h4 class="produtoSubTitulo text-dark">Preço de compra</h4>
                        <p class="corpo">{{ $produto->preco_compra }}</p>
                    </div>
                    @if(!is_null($produto->preco_venda))
                    <div class="col">
                        <h4 class="produtoSubTitulo text-dark">Preço de venda</h4>
                        <p class="corpo">{{ is_null($produto->preco_venda) ? '---' : $produto->preco_venda }} </p>
                    </div>
                    @endif
                </div>

                @if ($produto->preco_venda)
                    <div class="bg-success p-3 rounded-2 mb-3 text-center">
                        <h4 class="produtoSubTitulo text-light mb-0 ">Você terá um lucro de <span>  + R$ {{ $produto->preco_venda - $produto->preco_compra }}</span></h4>
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <h4 class="produtoSubTitulo text-dark">Data de compra</h4>
                        <p class="corpo">{{date('d/m/Y', strtotime($produto->data_compra))}}</p>
                    </div> 
                    @if(!is_null($produto->preco_data))
                    <div class="col">
                        <h4>Data de venda</h4>
                        <p class="corpo">{{ is_null($produto->data_venda) ? '---' : $produto->preco_venda }} </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
