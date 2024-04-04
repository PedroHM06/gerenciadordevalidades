
<table class="table">
    <thead>
        <tr>
            <th scope="col">detalhes</th>
            <th scope="col">Ação realizada</th>
            <th scope="col">data/hora do Log</th>

        </tr>
    </thead>
    <tbody class="conteudo">
        <tr>
                <td>
                    <p ><?php echo $index['details'] ?></p>
                </td>
                <td>
                    <p ><?php echo $index['action'] ?></p>
                </td>
                <td>
                <?php
                    $data_criacao_formatada = date('d/m/y - H:i', strtotime($index['created_at']));
                    ?>

                    <p class="date" dateFormat="dd/mm/yy"><?php echo $data_criacao_formatada; ?></p>

                </td>
                         
        </tr>

    </tbody>
</table>