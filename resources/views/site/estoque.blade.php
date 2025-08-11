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
                    <a href="{{ route('site.estoque') }}"
                        class="btn active-button text-start d-flex align-items-center"><img
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


            @include('_includes.listagem')
        <div class="col-12 col-md-12 col-lg-12 ">
            <div class="container-fluid">
                <div class="row g-3 flex-nowrap">
                    <div id="graficoVendas" class="col-12 col-md-8 conteudo-white p-3 mt-2 shadow-sm mb-5 rounded me-2"
                        style="height: 300px;">
                    </div>
                    <div id="graficoPizza" class="col-12 col-md-4 conteudo-white p-3 mt-2 shadow-sm rounded"
                        style="height: 300px;">
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script>
            option = {
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['Quant. Atual de Estoque', 'Estoque Ideal']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                // toolbox: {
                //     feature: {
                //         saveAsImage: {}
                //     }
                // },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom']
                },
                yAxis: {
                    type: 'value',
                    min: 0,
                    max: 50,
                    interval: 10
                },
                series: [{
                        name: 'Quant. Atual de Estoque',
                        type: 'line',
                        data: @json($quantAtual),
                        itemStyle: {
                            color: '#8131f8',
                        }
                    },
                    {
                        name: 'Estoque Ideal',
                        type: 'line',
                        data: @json($estoqueIdeal),
                        itemStyle: {
                            color: '#1CDD4F',
                        }
                    }
                ]
            };
            var chartDom = document.getElementById('graficoVendas');
            var chartVendas = echarts.init(chartDom);
            chartVendas.setOption(option);
            

            option = {
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    bottom: '10px',
                    left: 'center',
                    padding: [0, 0, 0, 0] // [top, right, bottom, left]
                },
                series: [{
                    name: 'Quantia em estoque por categoria',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    center: ['50%', '43%'], // [horizontal, vertical] - diminuir o segundo valor sobe o gráfico
                    avoidLabelOverlap: false,
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: 15,
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: [{
                            value: {{ $produtos->where('categoria_id', 1)->count() }},
                            name: 'Perfumaria',
                            itemStyle: {
                                color: '#5100C9',
                            }
                        },
                        {
                            value: {{ $produtos->where('categoria_id', 2)->count() }},
                            name: 'Maquiagem',
                            itemStyle: {
                                color: '#6C09FF',
                            }
                        },
                        {
                            value: {{ $produtos->where('categoria_id', 3)->count() }},
                            name: 'Skin Care',
                            itemStyle: {
                                color: '#8131F8',
                            }
                        },
                        {
                            value: {{ $produtos->where('categoria_id', 4)->count() }},
                            name: 'Corporal',
                            itemStyle: {
                                color: '#AD83ED',
                            }
                        },
                        {
                            value: {{ $produtos->where('categoria_id', 5)->count() }},
                            name: 'Cabelo',
                            itemStyle: {
                                color: '#C8A7FA',
                            }
                        }
                    ]
                }]
            };
            var chartDom = document.getElementById('graficoPizza');
            var chartPizza = echarts.init(chartDom);
            chartPizza.setOption(option);

            window.addEventListener('resize', function () {
            chartVendas.resize();
            chartPizza.resize();
    });
        </script>

    {{-- TODO fazer listagem com progress bar --}}
    @endsection
