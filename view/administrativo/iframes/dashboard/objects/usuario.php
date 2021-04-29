<?php

    /* USUÁRIOS */
    $sqlUsuarioAtivos = "SELECT COUNT(*) AS total FROM usuarios WHERE id_statusregistro = 1";
    $queryUsuariosAtivos = sqlQueries($conn, $sqlUsuarioAtivos, true)[0];

    $sqlUsuarioInativos = "SELECT COUNT(*) AS total FROM usuarios WHERE id_statusregistro = 2";
    $queryUsuariosInativos = sqlQueries($conn, $sqlUsuarioInativos, true)[0];

    $queryTotalUsuarios = $queryUsuariosAtivos['total'] + $queryUsuariosInativos['total'];

?>
<div class="col s12 m6 l6">
    <div class="card">
        <div class="card-title">
            <a><img src="../../../../images/icons/admin_panel_black.png">Usuários</a><span class="card-total"><?php echo $queryTotalUsuarios ?></span>
        </div>
        <div class="card-content">
            <div class="card-conteudo green lighten-4">
                <a><img src="../../../../images/icons/check-black.png">Ativos</a><label class="ativos-resultado"><?php echo $queryUsuariosAtivos['total'] ?></label>
            </div>
            <div class="card-conteudo red lighten-4">
                <a><img src="../../../../images/icons/block-black.png">Inativos</a><label class="ativos-resultado"><?php echo $queryUsuariosInativos['total'] ?></label>
            </div>
        </div>
    </div>
</div>