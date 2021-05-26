<?php

    /* CONTATO */
    $sqlContatoNew = "SELECT COUNT(*) AS total FROM website_contato WHERE visto = '0'";
    $queryContatoNew = sqlQueries($conn, $sqlContatoNew, true)[0];

    $sqlContato = "SELECT COUNT(*) AS total FROM website_contato WHERE visto = '1'";
    $queryContato = sqlQueries($conn, $sqlContato, true)[0];

    $queryTotalContato = $queryContatoNew['total'] + $queryContato['total'];

?>

<div class="col s12 m6 l6">
    <div class="card">
        <div class="card-title">
            <a data-link="view/administrativo/iframes/contato/controlador.php"><img src="../../../../images/icons/money_black.png">Contatos</a><span class="card-total"><?php echo $queryTotalContato ?></span>
        </div>
        <div class="card-content">
            <div class="card-conteudo green lighten-4">
                <a><img src="../../../../images/icons/visibility_off_black.png">Novos Contatos</a><label class="ativos-resultado"><?php echo $queryContatoNew['total'] ?></label>
            </div>
            <div class="card-conteudo">
                <a><img src="../../../../images/icons/visibility_black.png">Contatos Vistos</a><label class="ativos-resultado"><?php echo $queryContato['total'] ?></label>
            </div>
        </div>
    </div>
</div>