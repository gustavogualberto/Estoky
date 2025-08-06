 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionando produto</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                             produto <span class="required-red">*</span> </label>
                                         <input type="text" class="form-control" id="exampleFormControlInput1"
                                             placeholder="Digite o nome do produto" name="nome_produto" required>
                                     </div>
                                     <div class="mb-3">
                                         <label for="exampleFormControlInput1" class="form-label">Código
                                             do
                                             produto <span class="required-red">*</span></label>
                                         <input type="text" class="form-control" id="exampleFormControlInput1"
                                             placeholder="Digite o código do produto" name="codigo_de_barras" required>
                                     </div>
                                     <label for="exampleFormControlInput1" class="form-label">Categoria<span
                                             class="required-red">*</span></label>
                                     <div class="input-group">
                                         <select class="form-select" id="inputGroupSelect04"
                                             aria-label="Example select with button addon" name="categoria_id" required>
                                             <option selected disabled>Selecione uma categoria</option>
                                             @foreach ($categorias as $categoria)
                                                 <option value="{{ $categoria->id }}">
                                                     {{ $categoria->categoria }}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="mt-3">
                                         <label for="exampleFormControlInput1" class="form-label">Quantidade</label>
                                         <input type="number" class="form-control" id="exampleFormControlInput1"
                                             placeholder="Digite a quantidade" name="quantidade">
                                     </div>

                                 </div>
                                 {{-- TODO: verificar se o campo fornecedor foi feito corretamente --}}
                                 <div class="container-fluid col-6 ms-4">
                                     <div class="col">
                                         <div class="mb-3">
                                             <label for="exampleFormControlInput1"
                                                 class="form-label">Fornecedor</label>
                                             <input type="text" class="form-control" id="exampleFormControlInput1"
                                                 placeholder="Digite o código do produto" name="fornecedor">
                                         </div>
                                         <div class="row ">
                                             <div class="col">
                                                 <div class="mb-3">
                                                     <label for="exampleFormControlInput1" class="form-label">Data
                                                         de
                                                         compra <span class="required-red">*</span></label>
                                                     <input type="date" class="form-control"
                                                         id="exampleFormControlInput1"
                                                         placeholder="Digite o código do produto" name="data_compra"
                                                         required>
                                                 </div>
                                             </div>
                                             <div class="col">
                                                 <div class="mb-3">
                                                     <label for="exampleFormControlInput1" class="form-label">Data de
                                                         venda</label>
                                                     <input type="date" class="form-control"
                                                         id="exampleFormControlInput1"
                                                         placeholder="Digite o código do produto" name="data_venda">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col">
                                         <div class="row ">
                                             <div class="col">
                                                 <div class="mb-3">
                                                     <label for="exampleFormControlInput1" class="form-label">Preço de
                                                         compra <span class="required-red">*</span></label>
                                                     <input type="text" class="form-control"
                                                         id="exampleFormControlInput1"
                                                         placeholder="Digite o preço do produto" name="preco_compra"
                                                         required>
                                                     <div class="form-check form-switch mt-3">
                                                         <input class="form-check-input" type="checkbox"
                                                             role="switch" id="switchCheckChecked" name="status"  {{isset($produto) && $produto->status  == 1 ? 'checked' : ''}} style="cursor: pointer;">
                                                         <label class="form-check-label"
                                                             for="switchCheckChecked"> Produto ativo</label>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col">
                                                 <div class="mb-3">
                                                     <label for="exampleFormControlInput1" class="form-label">Preço de
                                                         venda</label>
                                                     <input type="text" class="form-control"
                                                         id="exampleFormControlInput1"
                                                         placeholder="Digite o preço do produto" name="preco_venda">

                                                 </div>

                                             </div>
                                         </div>

                                     </div>
                                 </div>


                             </div>
                         </div>


                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                         <button type="submit" class="btn btn-principal">Salvar</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
