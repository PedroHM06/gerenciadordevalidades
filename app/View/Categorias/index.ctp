<?php 
$item = array();
foreach ($categorias as $categoria){
    $faixaetariavalidade_amarelo = '';
    $faixaetariavalidade_vermelho = '';

    foreach($faixaetariavalidades as $faixaetariavalidade){
        if($categoria['Categoria']['id'] == $faixaetariavalidade['Faixaetariavalidade']['categoria_id']){
            $faixaetariavalidade_amarelo = $faixaetariavalidade['Faixaetariavalidade']['limite_amarelo'];
            $faixaetariavalidade_vermelho = $faixaetariavalidade['Faixaetariavalidade']['limite_vermelho'];
            break;        
        }
    }

    $item[] = array(
        'id' => $categoria['Categoria']['id'],
        'nome' => $categoria['Categoria']['nome'],
        'faixaetariaamarelo' => $faixaetariavalidade_amarelo,
        'faixaetariavermelho' => $faixaetariavalidade_vermelho
    );
}
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Faixa Amarela</th>
            <th scope="col">Faixa Vermelha</th>
        </tr>
    </thead>
    <tbody class="conteudo">
        <button type="button"  class="btn btn-success mt-5 mb-3" onclick="crud('', '','addModalCategoria', 'categorias', 'add', 'addModalCategoriaBody')">Novo +</button>
        <?php foreach ($item as $index ): ?>
        <tr>
                <td>
                    <button type="button" class="btn" onclick="categoriaView(<?= $index['id'];?>)"><?php echo $index['nome']; ?></button>
                </td>
                <td>
                    <p><?php echo $index['faixaetariaamarelo'] . ' Dias';?></p>
                </td>
                <td>
                    <p><?php echo $index['faixaetariavermelho'] . ' Dias';?></p>
                </td>
                <td>
                    <button type="button" class="btn btn-secondary" onclick="crud('<?= $index['id'];?>', '','editModalCategoria', 'categorias', 'edit', 'editModalBodyCategoria') ">Editar</button>
                    
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="crud('<?= $index['id'];?>', '', '', 'categorias', 'delete', '')">Excluir</button>
                </td>                
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
