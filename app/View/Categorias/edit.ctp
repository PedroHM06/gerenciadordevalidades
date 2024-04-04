<form id="editFormCategoria">
    <div class="form-group">
        <label for="nome">Nome</label>
        <textarea class="form-control" id="nome" name="nome" rows="1"><?php echo $categoria['Categoria']['nome']?></textarea>
    </div>
    <?php foreach ($faixaetariavalidades as $faixaetariavalidade): ?>
        <div class="form-group mt-3">
            <label for="limiteamarelo">Faixa Etária Amarelo para Validade</label>
            <input type='number' value="<?php echo $faixaetariavalidade['Faixaetariavalidade']['limite_amarelo']; ?>" class="form-control" placeholder="Quantidade em Dias" id="limiteamarelo" name="limiteamarelo">
        </div>
        <div class="form-group mt-3">
            <label for="limitevermelho">Faixa Etária Vermelho para Validade</label>
            <input type='number' value="<?php echo $faixaetariavalidade['Faixaetariavalidade']['limite_vermelho']; ?>" class="form-control" placeholder="Quantidade em Dias" id="limitevermelho" name="limitevermelho">
        </div>
    <?php endforeach; ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="editButton" onclick="crud('<?php echo $categoria['Categoria']['id']?>','editFormCategoria', 'editModalCategoria', 'categorias', 'save', '')" class="btn btn-success">Salvar Alterações</button>
    </div>
</form>
 