@extends('welcome')

@section('conteudo')

    <div class="container mt-5">
        <div class="row align-items-start">
            <div class="col-4 col-md-2 col-lg-5">
                <img src="{{asset('/img/IMG_20241118_192023 (1) (2).jpg')}}" alt="" class="w-100">
            </div>
            <div class="col">
                <h1>{{$produto->nome_produto}} {!! $produto->status == 0 ? '<span class="fs-6 btn-inativo">Inativo</span>' : '<span class="fs-6 btn-ativo">Ativo</span>' !!}</h1>
            </div>
        </div>
    </div>

@endsection
