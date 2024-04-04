<?php
$index = array();
foreach($usuarios as $usuario){
    $index[] = array(
    'id' => $usuario['Usuario']['id'],
    'login' => $usuario['Usuario']['login'],
    'senha' => $usuario['Usuario']['senha']
    );
}
?>

<table class="table" id="table-usuarios">
  <thead>
    <tr>
      <th scope="col">Login</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <button type="button" id="addModalButon" class="btn btn-success mt-5 mb-3" onclick="crud('', 'addFormUsuario', 'addModalUsuario', 'usuarios', 'add', 'addModalUsuarioBody')">Novo +</button>

  <tbody>
    <?php foreach ($index as $pos):?>
    <tr>
      <td>
        <p>
          <?php echo $pos['login'];?>
        </p>
      </td>
      <td>
        <button type="button" id="editModalButton" class="btn btn-secondary" onclick="crud('<?= $pos['id'];?>', 'editFormUsuario', 'editModalUsuario', 'usuarios', 'edit', 'editModalBodyUsuario')">Editar</button>

      </td>
      <td>
        <button type="button" id="deleteButton" class="btn btn-danger" onclick="crud('<?= $pos['id'];?>', '', '', 'usuarios', 'delete', '')">Excluir</button>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>