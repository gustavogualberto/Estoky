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
                    <a class="btn btn-menu text-start"> <i class="bi bi-card-checklist"></i> Estoque</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start "> <i class="bi bi-truck"></i> Fornecedores</a>
                </div>
                <div class="row mt-2 ms-2">
                    <a class="btn btn-menu text-start"> <i class="bi bi-piggy-bank-fill"></i> Movimentações</a>
                </div>
            </div>


            <div class="col-12 col-md-9 col-lg-10">
                <div class="container-fluid mt-4  ">
                    <div class="row">

                        <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav">
                            <div class="container text-start">
                                <div class="row">
                                    <div class="col-8 p-0">
                                        <p class="text-secondary cd-font">Total de produtos</p>
                                        <h4>0</h4>
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
                                        <p class="text-secondary cd-font">Estoque Baixo</p>
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
                                        <p class="text-secondary cd-font">Valor Total</p>
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
                                        <p class="text-secondary cd-font">Fornecedores</p>
                                        <h4>0</h4>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end align-items-center">
                                        <img src="{{ asset('/img/pendentes.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
