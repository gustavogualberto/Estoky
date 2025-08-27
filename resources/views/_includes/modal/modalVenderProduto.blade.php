 <div class="modal fade" id="modalVender-{{ $produto->id }}" tabindex="-1" aria-labelledby="modalVender"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">

         <div class="modal-content">
             <div class="modal-header ">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Vendendo {{ $produto->nome_produto }}</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('site.vender', $produto->id) }}" method="POST">
                 @csrf
                 <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="Cliente" class="form-label">Cliente <span class="required-red">*</span></label>
                         <select class="form-select mb-3" id="inputGroupSelect04"
                             aria-label="Example select with button addon" name="cliente_id" required>
                             <option selected disabled>Selecione o cliente</option>
                             @foreach ($clientes as $cliente)
                                 <option value="{{ $cliente->id }}">
                                     {{ $cliente->nome }}</option>
                             @endforeach
                         </select>
                        
                         <label for="Cliente" class="form-label ">Quantidade vendida <span
                                 class="required-red">*</span></label>
                         <input type="number" class="form-control" id="exampleFormControlInput1"
                             placeholder="Digite o nome do cliente" name="quantidade" required>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                     <button type="submit" class="btn btn-success">Vender</button>
                 </div>
             </form>
         </div>

     </div>
 </div>

 <div class="modal fade" id="modalAddCliente" aria-hidden="true" aria-labelledby="modalAddCliente" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Adicionar </h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 Hide this modal and show the first with the button below.
             </div>
             <div class="modal-footer">
                 <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to
                     first</button>
             </div>
         </div>
     </div>
 </div>
