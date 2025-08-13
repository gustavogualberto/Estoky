@extends('welcome')

@section('conteudo')
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-md-3 col-lg-2 border-end w-menu-white">
                {{-- menu lateral --}}
                <p class=" fw-bold mt-3 ">MENU PRINCIPAL</p>
                <div class="row mt-2 ms-2">
                    <button class="btn btn-menu text-start d-flex align-items-center"><img src="{{ asset('/img/home.svg') }}"
                            alt="" class="me-2"> Dashboard</button>
                </div>
                <div class="row mt-2 ms-2">
                    <a href="{{ route('site.produtos') }}" class="btn btn-menu text-start d-flex align-items-center"><img
                            src="{{ asset('/img/orders.svg') }}" alt="" class="me-2"> Produtos</a>
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
                    <h5 class="titulo fw-normal">Produtos sem estoque</h5>
                    <p class="corpo">Acompanhe itens que precisam ser reabastecidos</p>
                </div>
            </div>

            {{-- listagem --}}
            {{-- TODO: colocar background-color no css --}}
                @include('_includes.listaProdutos')
        </div>

    </div>
@endsection
