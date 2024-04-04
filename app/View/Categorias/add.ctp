
<form id="addCategoriaForm">
    <div class="form-group">
        <label for="nome">Nome</label>
        <textarea class="form-control" id="nome" name="nome"
            rows="1" ></textarea>
    </div>
    <div class="form-group mt-3">
        <label for="limiteamarelo ">Faixa Etária Amarelo para Validade</label>
        <input type='number' class="form-control" placeholder="Quantidade em Dias" id="limiteamarelo" name="limiteamarelo">
    </div>
    <div class="form-group mt-3">
        <label for="limitevermelho">Faixa Etária Vermelho para Validade</label>
        <input type='number' class="form-control" placeholder="Quantidade em Dias" id="limitevermelho" name="limitevermelho">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="addButton" onclick="crud('','addCategoriaForm','addModalCategoria', 'categorias', 'save','')" class="btn btn-success">Adicionar</button>
    </div>
</form>
