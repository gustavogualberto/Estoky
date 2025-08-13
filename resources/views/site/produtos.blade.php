{{-- TODO ok. Vendas vai ter a coluna produto_id, vendas vai ter a coluna cliente_id --}}
@extends('welcome')
@section('conteudo')
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-md-3 col-lg-2 border-end w-menu-white ">
                {{-- menu lateral --}}
                <p class=" fw-bold mt-3 titulo">MENU PRINCIPAL</p>
                <div class="row mt-2 ms-2">
                    <button class="btn btn-menu text-start d-flex align-items-center"><img src="{{ asset('/img/home.svg') }}"
                            alt="" class="me-2 titulo"> Dashboard</button>
                </div>
                <div class="row mt-2 ms-2 ">
                    <a href="{{ route('site.produtos') }}"
                        class="btn active-button text-start d-flex align-items-center"><img
                            src="{{ asset('/img/orders.svg') }}" alt="" class="me-2 "> Produtos</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a href="{{ route('site.estoque') }}" class="btn btn-menu text-start d-flex align-items-center"><img
                            src="{{ asset('/img/garage_door.svg') }}" alt="" class="me-2"> Estoque</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start d-flex align-items-center"><img
                            src="{{ asset('/img/local_shipping.svg') }}" alt="" class="me-2"> Fornecedores</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start d-flex align-items-center"><img
                            src="{{ asset('/img/request_quote.svg') }}" alt="" class="me-2"> Movimentações</a>
                </div>
            </div>

            {{-- dashboard --}}
            @include('_includes.listagem')


            <div class="row ms-1">
                <div class="col-6 justify-content-start ">
                    <h5 class="titulo fw-normal">Total de produtos</h5>
                    <p class="corpo">Gerencie todos os produtos cadastrados no sistema</p>
                </div>

                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-principal" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Adicionar
                        Produto</button>
                </div>

                @include('_includes.modalAdicionarProduto')

            </div>

            {{-- listagem --}}
            @include('_includes.listaProdutos')


        </div>
    </div>
@endsection
