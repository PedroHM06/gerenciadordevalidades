<form id="viewForm">
    <div class="form-group">
        <label for="nome">Nome</label>
        <textarea class="form-control" id="nome" name="nome"
            rows="1" disabled><?php echo $produto['Produto']['nome']?></textarea>
    </div>
    <div class="form-group">
        <label for="tamanho">Tamanho</label>
        <textarea class="form-control" id="tamanho" name="tamanho"
            rows="1" disabled><?php echo $produto['Produto']['tamanho']?></textarea>
    </div>
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <input class="form-control" id="categoria" name="categoria"
            rows="1" disabled><?php echo $produto['Produto']['categoria_id']?></input>
    </div>
    <div class="form-group">
        <label for="lote">Lote</label>
        <textarea class="form-control" id="lote" name="lote"
            rows="1" disabled><?php echo $produto['Produto']['lote']?></textarea>
    </div>
    <div class="form-group">
        <label for="validade">Data de validade</label>
        <textarea type='date' class="form-control" id="validade" name="validade"
            rows="1" disabled><?php echo $produto['Produto']['validade']?></textarea>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    </div>
</form>
