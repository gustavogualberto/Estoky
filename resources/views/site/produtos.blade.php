@extends('welcome')
@section('conteudo')
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-md-3 col-lg-2 border-end w-menu-white">
                {{-- menu lateral --}}
                <p class=" fw-bold mt-3 ">MENU PRINCIPAL</p>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start "> <i class="bi bi-house-door-fill"></i> Dashboard</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a href="{{ route('site.produtos') }}" class="btn btn-menu text-start"> <i class="bi bi-bag-fill"></i>
                        Produtos</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a href="{{ route('site.estoque') }}" class="btn btn-menu text-start"> <i
                            class="bi bi-card-checklist"></i> Estoque</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start "> <i class="bi bi-truck"></i> Fornecedores</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start"> <i class="bi bi-piggy-bank-fill"></i> Movimentações</a>
                </div>
            </div>

            {{-- dashboard --}}
            <div class="col-12 col-md-9 col-lg-10 btn-conteudo">
                <div class="container-fluid mt-4  ">
                    <div class="row">

                        <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav">
                            <div class="container text-start">
                                <div class="row">
                                    <div class="col-8 p-0">
                                        <p class="text-secondary cd-font">Total de produtos</p>
                                        <h4>{{ count($produtos) }}</h4>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end align-items-center">
                                        <img src="{{ asset('/img/total.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav">

                            <div class="container text-start">
                                <div class="row">
                                    <div class="col-8 p-0">
                                        <p class="text-secondary cd-font">Produtos ativos</p>
                                        <h4>0</h4>
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
                                        <h4>0</h4>
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


                    <!-- Modal adicionar-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionando produto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('salvar.produto') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="exampleFormControlInput1" class="form-label">Imagem do
                                                            produto</label>
                                                        <div class="input-group mb-3">
                                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                                name="imagem">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Nome do
                                                                produto</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Digite o nome do produto" name="nome_produto">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Código
                                                                do
                                                                produto</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Digite o código do produto"
                                                                name="codigo_de_barras">
                                                        </div>
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Categoria</label>
                                                        <div class="input-group">
                                                            <select class="form-select" id="inputGroupSelect04"
                                                                aria-label="Example select with button addon"
                                                                name="categoria">
                                                                <option selected>Selecione uma categoria</  option>
                                                                @foreach($categorias as $categoria)
                                                                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mt-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Quantidade</label>
                                                            <input type="number" class="form-control"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Digite a quantidade" name="quantidade">
                                                        </div>

                                                    </div>
                                                    {{-- TODO: verificar se o campo fornecedor foi feito corretamente --}}
                                                    <div class="container-fluid col-6 ms-4">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label"q>Fornecedor</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Digite o código do produto"
                                                                    name="fornecedor">
                                                            </div>
                                                            <div class="row ">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">Data
                                                                            de
                                                                            compra</label>
                                                                        <input type="date" class="form-control"
                                                                            id="exampleFormControlInput1"
                                                                            placeholder="Digite o código do produto"
                                                                            name="data_compra">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">Data
                                                                            de
                                                                            venda</label>
                                                                        <input type="date" class="form-control"
                                                                            id="exampleFormControlInput1"
                                                                            placeholder="Digite o código do produto"
                                                                            name="data_venda">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row ">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">Preço
                                                                            de
                                                                            compra</label>
                                                                        <input type="text" class="form-control"
                                                                            id="exampleFormControlInput1"
                                                                            placeholder="Digite o preço do produto"
                                                                            name="preco_compra">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">Preço
                                                                            de
                                                                            venda</label>
                                                                        <input type="text" class="form-control"
                                                                            id="exampleFormControlInput1"
                                                                            placeholder="Digite o preço do produto"
                                                                            name="preco_venda">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-principal">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <tr class="align-middle">
                                    <td class="fw-bold "><img src="{{ asset('/img/produtos.svg') }}" alt=""
                                            class="me-2">{{ $produto->nome_produto }}</td>
                                    <td>{{ $produto->codigo_de_barras }}</td>
                                    <td>{{ $produto->fornecedor }}</td>
                                    <td>{{ $produto->categoria }}</td>
                                    <td>{{ $produto->preco_compra }}</td>
                                    <td>{{ $produto->quantidade }}</td>

                                    {{-- TODO funcionalidades botões --}}


                                    <td><a href="" class="me-2 text-secondary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i class="bi bi-search"></i></a>
                                        <a href="" class="me-2 text-secondary"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <a href="" class="text-secondary"> <i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                    {{-- TODO Paginação --}}

                    @if ($search && count($produtos) == 0)
                        <p class="text-center">Não há resultados para sua pesquisa: "{{ $search }}".</p>
                    @else
                        <p class="text-center">Você não possui produtos cadastrados</p>
                    @endif
                </div>

            </div>



        </div>
    @endsection
