 {{-- todo fazer o modal para historico --}}
 <div class="modal fade" id="modalHistorico-{{ $produto->id }}" tabindex="-1" aria-labelledby="modalHistorico"
     aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-dialog">
             <div class="modal-content px-3 m-0">
                 <div class="modal-header ">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Histórico de compras</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 @php
                    $produtosVendas = $vendas->where('produto_id', $produto->id);
                 @endphp 
                 @if ($produtosVendas->isEmpty())
                        <p class="text-center text-secondary py-4">Nenhuma venda realizada para este produto.</p>
                    @else
                     <table class="table table-hover">
                         <thead>
                             <tr>
                                 <th class="fw-normal">COMPRADO POR</th>
                                 <th class="fw-normal">DATA VENDA</th>
                                 <th class="fw-normal">QUANTIDADE</th>
                                 <th class="fw-normal">AÇÃO</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($vendas as $venda)
                                 @if ($venda->produto_id == $produto->id)
                                     <tr>
                                         <td class="table-itens-secondary-color">
                                             {{ $venda->cliente->nome ?? 'Sem cliente' }}
                                         </td>
                                         <td class="table-itens-secondary-color">
                                             {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}
                                         </td>
                                         <td class="table-itens-secondary-color">
                                             {{ $venda->quantidade }}
                                         </td>
                                         <td>
                                            <a href="{{ route('site.visualizar', $produto->id) }}" class="text-secondary"
                                           title="Visualizar"><i class="bi bi-search btn btn-itens"
                                               style="padding: 4px 8px"></i></a>
                                         </td>
                                     </tr>
                                 @endif
                             @endforeach
                         </tbody>
                     </table>
                     @endif
             </div>
         </div>


     </div>

 </div>
 </div>
 </div>
 </div>
