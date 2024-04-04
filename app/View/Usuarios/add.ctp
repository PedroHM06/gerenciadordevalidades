<form id="addFormUsuario">
    <div class="form-group">
        <label for="login">Login</label>
        <textarea class="form-control" id="login" name="login"
            rows="1" required></textarea>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <textarea class="form-control" id="senha" name="senha"
            rows="1"></textarea>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="addButton" onclick="crud('','addFormUsuario','addModalUsuario','usuarios','save','')" class="btn btn-success">adicionar</button>
    </div>
</form>

    