<div class="modal fade" id="modalVender" tabindex="-1" aria-labelledby="modalVender" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrando cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('site.cliente') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="Nome" class="form-label">Nome <span class="required-red">*</span></label>
                            <input type="text" class="form-control mb-3" id="exampleFormControlInput1"
                                placeholder="Ex: Arthur Morgan" name="nome" required>
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control mb-3" id="exampleFormControlInput1"
                                placeholder="exemplo@email.com" name="email">
                            <label for="Telefone" class="form-label">Telefone<span class="required-red">*</span></label>
                            <input type="text" class="form-control mb-3" id="exampleFormControlInput1"
                                placeholder="Ex: 33 123456789" name="telefone" maxlength="15" >
                        </div>
                        <div class="col">
                            <label for="Cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control mb-3" id="exampleFormControlInput1"
                                placeholder="Ex: Entre Folhas" name="cidade">
                            <label for="Rua" class="form-label">Rua</label>
                            <input type="text" class="form-control mb-3" id="exampleFormControlInput1"
                                placeholder="Ex: Orestes de Paiva, 70" name="rua">
                            <label for="Bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control mb-3" id="exampleFormControlInput1"
                                placeholder="Ex: Centro" name="bairro">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
