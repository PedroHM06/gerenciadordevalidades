<?php

$tableLogs = array();
    foreach($logs as $log){
        $tableLogs[] = array(
            'post_id' => $log['PostLog']['post_id'],
            'action' => $log['PostLog']['action'],
            'details' => $log['PostLog']['details'],
            'create-at' => $log['PostLog']['create_at'],
        );
    }
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id do Post</th>
            <th scope="col">Ação realizada</th>
            <th scope="col">detalhes</th>
            <th scope="col">data/hora do Log</th>

        </tr>
    </thead>
    <tbody class="conteudo">
        <button type="button"  class="btn btn-success mt-5 mb-3" onclick="add()">Novo +</button>
        <?php foreach ($tableLogs as $index ): ?>
        <tr>
                <td>
                    <p><?php echo $index['post_id']; ?></p>
                </td>
                <td>
                    <p ><?php echo $index['action'] ?></p>
                </td>
                <td>
                    <p ><?php echo $index['details'] ?></p>
                </td>
                <td>
                <?php
                    $data_criacao_formatada = date('d/m/y - H:i', strtotime($index['create_at']));
                    ?>

                    <p class="date" dateFormat="dd/mm/yy"><?php echo $data_criacao_formatada; ?></p>

                </td>
                         
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>