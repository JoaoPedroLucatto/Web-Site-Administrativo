<?php
$titulo = 'Novo Projeto';

$sql = "SELECT clients.id, clients.nome_completo, clients.login, statu.descricao FROM clientes clients LEFT JOIN status_registros statu ON clients.id_statusregistro = statu.id WHERE clients.id_statusregistro = 1";
$listar_clientes = sqlQueries($conn, $sql, true);


$action = 'new';

$campoid = 'hide';

if ($_GET['trigger'] == 'edit') {

    $titulo = 'Editar Projeto';

    $sql = "SELECT * FROM projetos p WHERE id=". $_GET['row_id'][0];
    $listar = sqlQueries($conn, $sql, true)[0];

    $sql = "SELECT clients.id, clients.nome_completo, clients.login, statu.descricao, pro.id_cliente, pro.permite_selecionar, pro.permite_download FROM clientes clients INNER JOIN projetos_clientes pro ON clients.id = pro.id_cliente LEFT JOIN status_registros statu ON clients.id_statusregistro = statu.id WHERE pro.id_projeto =" . $_GET['row_id'][0];
    $listar_clientes_projeto = sqlQueries($conn, $sql, true);


    $action = $listar['id'];
    $caminho_projeto= "../../../../uploads/projetos/".$action.'/';

}
?>


<form enctype="multipart/form-data" method="POST" action="../../../../controller/administrativo/iframes/projetos/incluir_editar.php">
    <div class="row">
        <div class="s12">
            <div class="sub-header">
                <a class="title-sub-header"><img src="../../../../images/icons/folder-black.png"><?php echo $titulo?></a>
            </div>
        </div>
    </div>
    <div class="col s12 iframe-content">
        <ul class="tabs">
            <li class="tab"><a href="#principal">Principal</a></li>
            <li class="tab"><a href="#clientes">Clientes</a></li>
            <li class="tab"><a href="#foto-selecionadas">Fotos - Selecionadas</a></li>
        </ul>
        <div id="principal"><?php include_once 'objects/principal.php';?></div>
        <div id="clientes" class="col s12"><?php include_once 'objects/clientes.php'?></div>
        <div id="foto-selecionadas" class="col s12"><?php include_once 'objects/foto-selecionadas.php'?></div>
    </div>

    <div class="iframe-footer">
        <button type="submit" class="green darken-2 right save-form" name="action" value="<?php echo $action; ?>"> <img src="../../../../images/icons/check-white.png"> Salvar</button>
        <button type="button" class="red darken-2 left" name="backscreen" value="controlador.php"> <img src="../../../../images/icons/close-white.png"> Cancelar</button>
    </div>
</form>