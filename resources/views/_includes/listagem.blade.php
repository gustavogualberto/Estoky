<div class="col-12 col-md-9 col-lg-10 btn-conteudo">
    <div class="container-fluid mt-4  ">
        <div class="row">
            <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav cursor-pointer">
                <div class="container text-start ">
                    <a href="/" class="text-reset text-decoration-none">
                        <div class="row">
                            <div class="col-8 p-0">
                                <p class="text-secondary cd-font">Total de produtos</p>
                                @if (Route::currentRouteName() == 'site.ativos')
                                    <h4>{{ $produtos->where('status', 1)->count() }}</h4>
                                @elseif(Route::currentRouteName() == 'site.inativos')
                                    <h4>{{ $produtos->where('status', 0)->count() }}</h4>
                                @elseif(Route::currentRouteName() == 'site.sem-estoque')
                                    <h4>{{ $produtos->where('quantidade', 0)->count() }}</h4>
                                @else
                                    <h4>{{ count($produtos) }}</h4>
                                @endif
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
                    <a href="{{ route('site.ativos') }}" class="text-reset text-decoration-none">
                        <div class="row">
                            <div class="col-8 p-0">
                                <p class="text-secondary cd-font">Produtos ativos</p>
                                @if (Route::currentRouteName() == 'site.ativos')
                                    <h4>{{ $produtos->where('status', 1)->count() }}</h4>
                                @elseif(Route::currentRouteName() == 'site.inativos')
                                    <h4>0</h4>
                                @elseif(Route::currentRouteName() == 'site.sem-estoque')
                                    <h4>{{ $produtos->where('status', 1)->where('quantidade', 0)->count() }}</h4>
                                @else
                                    <h4>{{ $produtos->where('status', 1)->count() }}</h4>
                                @endif
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <img src="{{ asset('/img/ativos.svg') }}" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav">
                <div class="container text-start">
                    <a href="{{ route('site.inativos') }}" class="text-reset text-decoration-none">
                        <div class="row">
                            <div class="col-8 p-0">
                                <p class="text-secondary cd-font">Produtos inativos</p>
                                @if (Route::currentRouteName() == 'site.inativos')
                                    <h4>{{ $produtos->where('status', 0)->count() }}</h4>
                                @elseif(Route::currentRouteName() == 'site.ativos')
                                    <h4>0</h4>
                                @elseif(Route::currentRouteName() != 'site.ativos')
                                    <h4>{{ $produtos->where('status', 0)->count() }}</h4>
                                @endif
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <img src="{{ asset('/img/inativos.svg') }}" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav">
                <div class="container text-start">
                    <a href="{{ route('site.sem-estoque') }}" class="text-reset text-decoration-none">
                        <div class="row">
                            <div class="col-8 p-0">
                                <p class="text-secondary cd-font">Fora de estoque</p>
                                @if (Route::currentRouteName() == 'site.sem-estoque')
                                    <h4>{{ $produtos->where('quantidade', 0)->count() }}</h4>
                                @elseif(Route::currentRouteName() == 'site.ativos')
                                    <h4>{{ $produtos->where('quantidade', 0)->where('status', 1)->count() }}</h4>
                                @elseif(Route::currentRouteName() == 'site.inativos')
                                    <h4>{{ $produtos->where('quantidade', 0)->where('status', 0)->count() }}</h4>
                                @elseif(Route::currentRouteName() == 'site.estoque')
                                    <h4>{{ $produtos->where('quantidade', 0)->count() }}</h4>
                                @elseif(Route::currentRouteName() == 'site.produtos')
                                    <h4>{{ $produtos->where('quantidade', 0)->count() }}</h4>
                                @endif
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <img src="{{ asset('/img/pendentes.svg') }}" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
