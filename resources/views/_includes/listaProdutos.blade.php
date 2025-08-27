           <div class="container-fluid w-100 p-3 mt-2 shadow-sm p-3 mb-5 bg-body-light rounded bg-white">

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
                           @if (
                               (Route::currentRouteName() == 'site.ativos' && $produto->status == 1) ||
                                   Route::currentRouteName() == 'site.produtos' ||
                                   (Route::currentRouteName() == 'site.inativos' && $produto->status == 0) ||
                                   (Route::currentRouteName() == 'site.sem-estoque' && $produto->quantidade == 0))
                               <tr class="align-middle ">
                                   <td
                                       class="fw-bold {{ $produto->status == 0 ? 'text-body-tertiary' : 'table-itens-secondary-color' }}">
                                       <img src="{{ asset('/img/produtos.svg') }}" alt=""
                                           class="me-2">{{ $produto->nome_produto }}
                                   </td>
                                   <td
                                       class="{{ $produto->status == 0 ? 'text-body-tertiary' : 'table-itens-secondary-color' }}">
                                       {{ $produto->codigo_de_barras }}</td>
                                   <td
                                       class="{{ $produto->status == 0 ? 'text-body-tertiary' : 'table-itens-secondary-color' }}">
                                       {{ $produto->fornecedor }}</td>
                                   <td
                                       class="{{ $produto->status == 0 ? 'text-body-tertiary' : 'table-itens-secondary-color' }}">
                                       {{ $produto->categoria->categoria }}</td>
                                   <td
                                       class="{{ $produto->status == 0 ? 'text-body-tertiary' : 'table-itens-secondary-color' }}">
                                       R$ {{ $produto->preco_compra }}</td>
                                   <td class="{{ $produto->quantidade == 0 ? 'text-danger' : 'text-success' }}">
                                       {{ $produto->quantidade }} unidades</td>

                                   <td><a href="{{ route('site.visualizar', $produto->id) }}" class="text-secondary"
                                           title="Visualizar"><i class="bi bi-search btn btn-itens"
                                               style="padding: 4px 8px"></i></a>

                                       @include('_includes.modal.modalEditarProduto')
                                       @include('_includes.modal.modalInativarProduto')
                                       @include('_includes.modal.modalVenderProduto')
                                       @include('_includes.modal.modalHistoricoCompras')
                                       <button
                                           class="btn btn-item-sale {{ $produto->quantidade == 0 ? 'disabled text-secondary' : '' }}"
                                           title="Vender" data-bs-toggle="modal"
                                           data-bs-target="#modalVender-{{ $produto->id }}" style="padding: 4px 8px"
                                           {{ $produto->quantidade == 0 ? 'disabled aria-disabled="true" tabindex=-1' : '' }}>
                                           <i class="bi bi-cart-check-fill"></i>
                                       </button>

                                       <div class="dropdown d-inline">
                                           <button class="btn btn-itens " type="button" data-bs-toggle="dropdown"
                                               aria-expanded="false" style="padding: 4px 8px">
                                               <i class="bi bi-three-dots-vertical"></i>
                                           </button>
                                           <ul class="dropdown-menu">
                                               <li><a class="dropdown-item cursor-pointer" title="Editar"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#modalEditar-{{ $produto->id }}">Editar</a>
                                               </li>
                                               <li><a class="dropdown-item btn-item-delete cursor-pointer"
                                                       title="Inativar" data-bs-toggle="modal"
                                                       data-bs-target="#modalInativar-{{ $produto->id }}">Excluir</a>
                                               </li>
                                               <li><a class="dropdown-item cursor-pointer" title="Historico" data-bs-toggle="modal"
                                                       data-bs-target="#modalHistorico-{{ $produto->id }}">Histórico</a>
                                               </li>
                                           </ul>
                                       </div>

                                   </td>
                               </tr>
                           @endif
                       @endforeach
                   </tbody>
               </table>

               @if ($search && count($produtos) == 0)
                   <p class="text-center text-secondary">Não há resultados para sua pesquisa: "{{ $search }}".
                   </p>
               @elseif (count($produtos) == 0)
                   <p class="text-center text-secondary">Você não possui produtos cadastrados.</p>
               @endif
               <div class="d-flex justify-content-center mt-4">
                   {{ $produtos->links() }}
               </div>
           </div>
