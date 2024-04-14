<?php 

$item = array();
foreach ($produtos as $produto){
    $categoria_nome = ''; 
    $faixaetariavalidade_amarelo = '';
    $faixaetariavalidade_vermelho = '';

    foreach ($categorias as $categoria) {
        if ($categoria['Categoria']['id'] == $produto['Produto']['categoria_id']) {
            $categoria_nome = $categoria['Categoria']['nome'];
            break;
        }
    }
  
        foreach($faixaetariavalidades as $faixaetariavalidade){
            if($categoria['Categoria']['id'] == $faixaetariavalidade['Faixaetariavalidade']['categoria_id']){
            $faixaetariavalidade_amarelo = $faixaetariavalidade['Faixaetariavalidade']['limite_amarelo'];
            $faixaetariavalidade_vermelho = $faixaetariavalidade['Faixaetariavalidade']['limite_vermelho'];
            break;        
            }
        }
    
    $item[] = array(
        'id' => $produto['Produto']['id'],
        'nome' => $produto['Produto']['nome'],
        'tamanho' => $produto['Produto']['tamanho'],
        'categoria' => $categoria_nome,
        'lote' => $produto['Produto']['lote'],
        'validade' => $produto['Produto']['validade'],
        'quantidade' => $produto['Produto']['quantidade'],
        'status' => $produto['Produto']['status']
    );
};
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Categoria</th>
            <th scope="col">Lote</th>
            <th scope="col">Validade</th>
            <th scope="col">Dias para o vencimento</th>
            <th scope="col">Status</th>
        
            <th scope="col">Quantidade</th>
        </tr>
    </thead>
    <tbody class="conteudo">
        <button type="button"  class="btn btn-success mt-5 mb-3" onclick="crud('', '', 'addModal', 'produtos', 'add', 'addModalBody')">Novo +</button>
        <?php foreach ($item as $index ): ?>
            <?php
                $validade = $index['validade'];
                date_default_timezone_set('America/Sao_Paulo');
                $dataAtual = date('Y-m-d');
                
                $validadeDateTime = new DateTime($validade);
                $dataAtualDateTime = new DateTime($dataAtual);

                $diferenca = $validadeDateTime->diff($dataAtualDateTime);
               
                if ($diferenca->days <= $faixaetariavalidade_vermelho) {
                    $resultado = 'table-danger';
                } elseif($diferenca->days > $faixaetariavalidade_vermelho && $diferenca->days <= $faixaetariavalidade_amarelo) {
                    $resultado = 'table-warning';
                } else {
                    $resultado = '';
                }
            ?>
        <tr class="<?php echo $resultado ?>">
                <td>
                    <label for="nome"></label>
                    <button type="button" class="btn" onclick="view(<?= $index['id'];?>)"><?php echo $index['nome']; ?></button>
                </td>
                <td>
                    <p><?php echo $index['tamanho'];?></p>
                </td>
                <td>
                    <p><?php echo $index['categoria']?></p>
                </td>                
                <td>
                    <p><?php echo $index['lote'];?></p>
                </td>
                <td>
                <?php
                    $data_validade_formatada = date('d/m/y', strtotime($index['validade']));
                ?>
                    <p class="date" dateFormat="dd/mm/yy"><?php echo $data_validade_formatada; ?></p>

                </td>
                <td>
                    <p><?php $diasValidade = ($validade < $dataAtual) ?  'Vencido a ' . $diferenca->days . ' dias'  :  $diferenca->days .' dias.'; echo $diasValidade;?></p>
                </td>
                 <td>
                    <p><?php if($validade >= $dataAtual) { if($validade == $dataAtual){$index['status'] = 'A vencer';}; echo $index['status'];}else if ($index['status'] == 'A vencer' || $index['status'] == '' ) {echo 'Alterar status';} else {echo $index['status'];};?></p>
                </td>
                <td>
                    <p><?php echo $index['quantidade']?></p>
                </td>
                <td>
                    <button type="button" class="btn btn-secondary" onclick="crud(<?= $index['id']?>, '', 'editModal', 'produtos', 'edit', 'editModalBody')">Editar</button>
                    
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="crud('<?= $index['id'];?>', '', '', 'produtos', 'delete', '')">Excluir</button>
                </td>                
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

