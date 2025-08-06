@extends('welcome')
@section('conteudo')
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-md-3 col-lg-2 border-end w-menu-white">
                {{-- menu lateral --}}
                <p class=" fw-bold mt-3 ">MENU PRINCIPAL</p>
                <div class="row mt-2 ms-2">                    
                    <button class="btn btn-menu text-start d-flex align-items-center"><img src="{{asset('/img/home.svg')}}" alt="" class="me-2" > Dashboard</button>
                </div>
                <div class="row mt-2 ms-2">
                    <a href="{{ route('site.produtos') }}" class="btn btn-menu text-start d-flex align-items-center"><img src="{{asset('/img/orders.svg')}}" alt="" class="me-2" >  Produtos</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a href="{{ route('site.estoque') }}" class="btn btn-menu text-start d-flex align-items-center"><img src="{{asset('/img/garage_door.svg')}}" alt="" class="me-2" > Estoque</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start d-flex align-items-center"><img src="{{asset('/img/local_shipping.svg')}}" alt="" class="me-2" > Fornecedores</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start d-flex align-items-center"><img src="{{asset('/img/request_quote.svg')}}" alt="" class="me-2" > Movimentações</a>
                </div>
            </div>

            {{-- dashboard --}}
            <div class="col-12 col-md-9 col-lg-10 btn-conteudo">
                <div class="container-fluid mt-4  ">
                    <div class="row">

                        <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav cursor-pointer">
                            <div class="container text-start ">
                                <a href="{{route('site.ativos')}}" class="text-reset text-decoration-none">
                                <div class="row">
                                    <div class="col-8 p-0" >
                                        <p class="text-secondary cd-font">Total de produtos</p>
                                        <h4>{{ count($produtos) }}</h4>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end align-items-center">
                                        <img src="{{ asset('/img/total.svg') }}" alt="">
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav">

                            <div class="container text-start">
                                <div class="row">
                                    <div class="col-8 p-0">
                                        <p class="text-secondary cd-font">Produtos ativos</p>
                                        <h4>{{$produtos->where('status', 1)->count()}}</h4>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end align-items-center">
                                        <img src="{{ asset('/img/ativos.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav">

                            <div class="container text-start">
                                <div class="row">
                                    <div class="col-8 p-0">
                                        <p class="text-secondary cd-font">Produtos inativos</p>
                                        <h4>{{$produtos->where('quantidade', 0)->count()}}</h4>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end align-items-center">
                                        <img src="{{ asset('/img/inativos.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav">
                            <div class="container text-start">
                                <div class="row">
                                    <div class="col-8 p-0">
                                        <p class="text-secondary cd-font">Fora de estoque</p>
                                        <h4>{{ $produtos->where('quantidade', 0)->count() }}</h4>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end align-items-center">
                                        <img src="{{ asset('/img/pendentes.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row ms-1">
                    <div class="col-6 justify-content-start ">
                        <h6>Inventário de produtos</h6>
                        <p>Gerencie seus itens de estoque e níveis de inventário</p>
                    </div>

                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <button type="button" class="btn btn-principal" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Adicionar
                            Produto</button>
                    </div>

                    @include('_includes.modalAdicionarProduto')

                </div>

                {{-- listagem --}}
                {{-- TODO: colocar background-color no css --}}
                <div class="container-fluid w-100 p-3 mt-2 shadow-sm p-3 mb-5 bg-body-light rounded"
                    style="background-color: white;">

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th class="fw-normal">PRODUTO</th>
                                <th class="fw-normal">CÓDIGO</th>
                                <th class="fw-normal">FORNECEDOR</th>
                                <th class="fw-normal">CATEGORIA</th>
                                <th class="fw-normal">VALOR</th>
                                <th class="fw-normal">QUANTIDADE</th>
                                <th class="fw-normal">AÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr class="align-middle ">
                                    <td class="fw-bold table-itens-secondary-color"><img
                                            src="{{ asset('/img/produtos.svg') }}" alt=""
                                            class="me-2">{{ $produto->nome_produto }}</td>
                                    <td class="table-itens-secondary-color">{{ $produto->codigo_de_barras }}</td>
                                    <td class="table-itens-secondary-color">{{ $produto->fornecedor }}</td>
                                    <td class="table-itens-secondary-color">{{ $produto->categoria->categoria }}</td>
                                    <td class="table-itens-secondary-color">R$ {{ $produto->preco_compra }}</td>
                                    <td class="table-itens-secondary-color ">{{ $produto->quantidade }}</td>

                                    {{-- TODO funcionalidades botões --}}


                                    <td><a href="" class="text-secondary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i class="bi bi-search btn btn-itens" style="padding: 4px 8px"></i></a>
                                        <a href="" class="text-secondary"><i class="bi bi-pencil-fill btn btn-itens" style="padding: 4px 8px"></i></a>
                                        <a href="" class="text-secondary "> <i class="bi bi-trash-fill btn btn-itens" style="padding: 4px 8px"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                    {{-- TODO Paginação --}}

                    @if ($search && count($produtos) == 0)
                        <p class="text-center">Não há resultados para sua pesquisa: "{{ $search }}".</p>
                    @elseif (count($produtos) == 0)
                        <p class="text-center">Você não possui produtos cadastrados.</p>
                    @endif
                </div>

            </div>



        </div>
    @endsection
