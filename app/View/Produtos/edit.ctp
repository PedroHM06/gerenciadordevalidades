
<form id="editForm">
<div class="form-group">
        <label for="nome">Nome</label>
        <textarea class="form-control" id="nome" name="nome"
            rows="1" ><?php echo $produto['Produto']['nome']?></textarea>
    </div>
    <div class="form-group">
        <label for="tamanho">Tamanho</label>
        <textarea class="form-control" id="tamanho" name="tamanho"
            rows="1" ><?php echo $produto['Produto']['tamanho']?></textarea>
    </div>
    <div class="form-group">
    <label for="categoria_id">Selecione uma Categoria</label>
    <select class="form-control" name="categoria_id" id="categoria_id">
        <option value="">Selecione uma categoria</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria['Categoria']['id']; ?>">
                <?php echo $categoria['Categoria']['nome']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">
        <label for="lote">Lote</label>
        <textarea class="form-control" id="lote" name="lote"
            rows="1" ><?php echo $produto['Produto']['lote']?></textarea>
    </div>
    <div class="form-group">
        <label for="validade">Data de validade</label>
        <input type='date' class="form-control" id="validade" name="validade"
            value="<?php echo $produto['Produto']['validade']?>" >
    </div>
    <div class="form-group mt-3">
    <label for="status">Status</label>
    <select class="form-control" name="status" id="status">
        <option value="" selected><?php $produto['Produto']['status']?></option>
        <option value="A vencer">A vencer</option>
        <option value="Vencido">Vencido</option>
    </select>
    <div class="form-group">
        <label for="quantidade">Quantidade do Produto</label>
        <input type='number' value="<?php echo $produto['Produto']['quantidade']?>" class="form-control" id="quantidade" name="quantidade">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="editButton" onclick="crud('<?php echo $produto['Produto']['id']?>','editForm', 'editModal', 'produtos', 'save', '');" class="btn btn-success">Editar</button>
    </div>

</form>



  
  
