<form id="editFormUsuario">
    <div class="form-group">
        <label for="login">Login</label>
        <textarea class="form-control" id="login" name="login"
            rows="1"><?php echo $usuario['Usuario']['login']?></textarea>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <textarea class="form-control" id="senha" name="senha"
            rows="1"><?php echo $usuario['Usuario']['senha']?></textarea>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="editButton" onclick="crud('<?= $usuario['Usuario']['id'];?>', 'editFormUsuario', 'editModalUsuario', 'usuarios', 'save', 'editModalBodyUsuario')"   class="btn btn-success">Salvar Alterações</button>
    </div>
</form>