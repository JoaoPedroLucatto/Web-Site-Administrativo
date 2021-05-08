<?php

    /* CLIENTES */
    $sqlclienteAtivos = "SELECT COUNT(*) AS total FROM clientes WHERE id_statusregistro = 1";
    $rowclienteAtivos = sqlQueries($conn, $sqlclienteAtivos, true)[0];

    $sqlclienteInativos = "SELECT COUNT(*) as total FROM clientes WHERE id_statusregistro = 2";
    $rowclienteInativos = sqlQueries($conn, $sqlclienteInativos, true)[0];

    $totalcliente = $rowclienteAtivos['total'] + $rowclienteInativos['total'];

?>

<div class="col s12 m6 l6">
    <div class="card">
        <div class="card-title">
            <a data-link="view/administrativo/iframes/cliente/controlador.php"><img src="../../../../images/icons/groups_black.png">Clientes</a><span class="card-total"><?php echo $totalcliente ?></span>
        </div>
        <div class="card-content">
            <div class="card-conteudo green lighten-4">
                <a><img src="../../../../images/icons/check-black.png">Ativos</a><label class="ativos-resultado"><?php echo $rowclienteAtivos['total'] ?></label>
            </div>
            <div class="card-conteudo red lighten-4">
                <a><img src="../../../../images/icons/block-black.png">Inativos</a><label class="ativos-resultado"><?php echo $rowclienteInativos['total'] ?></label>
            </div>
        </div>
    </div>
</div>