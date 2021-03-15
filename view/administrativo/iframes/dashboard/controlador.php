<!-- CSS -->
<link rel="stylesheet" href="../../../../style/css/administrativo/objects/sub-header.css">
<link rel="stylesheet" href="../../../../style/css/administrativo/objects/dashboard/card.css">
<link rel="stylesheet" href="../../../../style/css/materialize-framework.css">


<?php

    include_once '../../../../model/connect.php';

    $arra_return = true;

    /* CLIENTES */
    $sqlclienteAtivos = "SELECT COUNT(*) AS total FROM clientes WHERE id_statusregistro = 1";
    $rowclienteAtivos = sqlQueries($conn, $sqlclienteAtivos, $arra_return)[0];

    $sqlclienteInativos = "SELECT COUNT(*) as total FROM clientes WHERE id_statusregistro = 2";
    $rowclienteInativos = sqlQueries($conn, $sqlclienteInativos, $arra_return)[0];

    /* PROJETOS */
    $sqlprojetosAtivos = "SELECT COUNT(*) AS total FROM projetos WHERE id_statusregistro = 1";
    $rowprojetosAtivos = sqlQueries($conn, $sqlprojetosAtivos, $arra_return)[0];

    $sqlprojetosInativos = "SELECT COUNT(*) AS total FROM projetos WHERE id_statusregistro = 2";
    $rowprojetosInativos = sqlQueries($conn, $sqlprojetosInativos, $arra_return)[0];

    $totalcliente = $rowclienteAtivos['total'] + $rowclienteInativos['total'];
    $totalprojetos = $rowprojetosAtivos['total'] + $rowprojetosInativos['total'];

?>

<div class="row">
    <div class="s12">
        <div class="sub-header">
            <a class="title-sub-header"><img src="../../../../images/icons/dashboard_black.png">Painel</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m6 l6">
        <div class="card">
            <div class="card-title">
                <a><img src="../../../../images/icons/groups_black.png">Clientes</a><span class="card-total"><?php echo $totalcliente?></span>
            </div>
            <div class="card-content">
                <div class="card-conteudo">
                    <a><img src="../../../../images/icons/check-black.png">Liberados</a><label class="ativos-resultado"><?php echo $rowclienteAtivos['total']?></label>
                </div>
                <div class="card-conteudo">
                    <a><img src="../../../../images/icons/block-black.png">Inativos</a><label class="ativos-resultado"><?php echo $rowclienteInativos['total']?></label>
                </div>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l6">
        <div class="card">
            <div class="card-title">
                <a><img src="../../../../images/icons/folder-black.png">Prejetos</a><span class="card-total"><?php echo $totalprojetos?></span>
            </div>
            <div class="card-content">
                <div class="card-conteudo">
                    <a><img src="../../../../images/icons/check-black.png">Liberados</a><label class="ativos-resultado"><?php echo $rowprojetosAtivos['total']?></label>
                </div>
                <div class="card-conteudo">
                    <a><img src="../../../../images/icons/block-black.png">Inativos</a><label class="ativos-resultado"><?php echo $rowprojetosInativos['total']?></label>
                </div>
            </div>
        </div>
    </div>
</div>
