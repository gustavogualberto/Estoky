 <div class="modal fade" id="modalInativar-{{$produto->id}}" tabindex="-1" aria-labelledby="modalInativar" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header ">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Alerta!</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <form action="{{ route('site.inativar', $produto->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                     <div class="modal-body">
                        <p>Tem certeza que deseja inativar produto: {{$produto->nome_produto}}?</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                         <button type="submit" class="btn btn-danger">Inativar</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
