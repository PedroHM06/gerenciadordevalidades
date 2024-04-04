
<form id="addForm">
    <div class="form-group">
        <label for="nome">Nome</label>
        <textarea class="form-control" id="nome" name="nome"
            rows="1" ></textarea>
    </div>
    <div class="form-group mt-3">
        <label for="tamanho">Tamanho</label>
        <input class="form-control" id="tamanho" name="tamanho"
            rows="1" >
    </div>
    <div class="form-group mt-3">
    <label for="categoria_id">Categoria</label>
    <select class="form-control" name="categoria_id" id="categoria_id">
        <option value="">Selecione uma categoria</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria['Categoria']['id']; ?>">
                <?php echo $categoria['Categoria']['nome'];?>
            </option>
        <?php endforeach; ?>
    </select>
    </div>

    </div>
    <div class="form-group mt-3">
        <label for="lote">Lote</label>
        <textarea class="form-control" id="lote" name="lote"
            rows="1" ></textarea>
    </div>
    <div class="form-group mt-3">
        <label for="validade">Data de validade</label>
        <input type='date' class="form-control" id="validade" name="validade"
            rows="1" >
    </div>
    <div class="form-group mt-3">
    <label for="status">Status</label>
    <select class="form-control" name="status" id="status">
        <option value="">-Selecione um status-</option>
        <option value="A vencer">A vencer</option>
        <option value="Vencido">Vencido</option>
    </select>
    </div>
    <div class="form-group mt-3">
        <label for="quantidade">Quantidade do Produto</label>
        <input type='number' class="form-control" id="quantidade" name="quantidade">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="addButton" onclick="crud('', 'addForm', 'addModal', 'produtos', 'save', '');" class="btn btn-success">Adicionar</button>
    </div>

</form>
