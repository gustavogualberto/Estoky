<div class="col-12 col-md-9 col-lg-10 btn-conteudo">
    <div class="container-fluid mt-4  ">
        <div class="row">
            <div class="col count-data me-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white-nav cursor-pointer">
                <div class="container text-start ">
                    <a href="/" class="text-reset text-decoration-none">
                        <div class="row">
                            <div class="col-8 p-0">
                                <p class="text-secondary cd-font">Saldo atual</p>
                                <h4>{{ $saldo }}</h4>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                @if (Route::currentRouteName() == 'site.produtos')
                                    <img src="{{ asset('/img/total.svg') }}" alt="">
                                @else
                                    <img src="{{ asset('/img/total_des.svg') }}" alt="">
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col count-data me-2 shadow-sm p-3 mb-5 rounded ">
                <div class="container text-start">
                        <div class="row">
                            <div class="col-8 p-0">
                                <p class="text-secondary cd-font">Status bancário</p>
                                @if($status)
                                 <h4>Positivo</h4>
                                @else
                                <h4>Negativo</h4>
                                @endif

                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                @if (Route::currentRouteName() == 'site.ativos')
                                    <img src="{{ asset('/img/ativos.svg') }}" alt="">
                                @elseif(Route::currentRouteName() == 'site.produtos')
                                    <img src="{{ asset('/img/ativos.svg') }}" alt="">
                                @else
                                    <img src="{{ asset('/img/ativos_des.svg') }}" alt="">
                                @endif
                            </div>
                        </div>
                </div>
            </div>

            <div class="col count-data shadow-sm p-3 mb-5 rounded bg-white-nav">
                <div class="container text-start">
                        <div class="row">
                            <div class="col-8 p-0">
                                <p class="text-secondary cd-font">Quantidade de vendas</p>
                                
                                    <h4>{{ $vendas->count() }}</h4>
                                    
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                @if (Route::currentRouteName() == 'site.sem-estoque')
                                    <img src="{{ asset('/img/pendentes.svg') }}" alt="">
                                @elseif(Route::currentRouteName() == 'site.produtos')
                                    <img src="{{ asset('/img/pendentes.svg') }}" alt="">
                                @else
                                    <img src="{{ asset('/img/pendentes_des.svg') }}" alt="">
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
