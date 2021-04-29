<?php

    /* PROJETOS */
    $sqlprojetosAtivos = "SELECT COUNT(*) AS total FROM projetos WHERE id_statusregistro = 1";
    $rowprojetosAtivos = sqlQueries($conn, $sqlprojetosAtivos, true)[0];

    $sqlprojetosInativos = "SELECT COUNT(*) AS total FROM projetos WHERE id_statusregistro = 2";
    $rowprojetosInativos = sqlQueries($conn, $sqlprojetosInativos, true)[0];

    $totalprojetos = $rowprojetosAtivos['total'] + $rowprojetosInativos['total'];

?>

<div class="col s12 m6 l6">
    <div class="card">
        <div class="card-title">
            <a><img src="../../../../images/icons/folder-black.png">Prejetos</a>
            <span class="card-total"><?php echo $totalprojetos ?></span>
        </div>
        <div class="card-content">
            <div class="card-conteudo green lighten-4">
                <a><img src="../../../../images/icons/check-black.png">Liberados</a>
                <label class="ativos-resultado"><?php echo $rowprojetosAtivos['total'] ?></label>
            </div>
            <div class="card-conteudo red lighten-4">
                <a><img src="../../../../images/icons/block-black.png">Inativos</a>
                <label class="ativos-resultado"><?php echo $rowprojetosInativos['total'] ?></label>
            </div>
        </div>
    </div>
</div>