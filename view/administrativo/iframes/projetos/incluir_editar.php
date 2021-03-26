<?php
$titulo = 'Novo Projeto';

$sql = "SELECT c.id, c.nome_completo, c.login, r.descricao FROM foto.clientes c INNER JOIN foto.status_registros r ON c.id_statusregistro = r.id WHERE c.id_statusregistro = 1";
$listar_clientes = sqlQueries($conn, $sql, true);

/* print_r($listar_clientes); */

$action = 'new';

$campoid = 'hide';

if ($_GET['trigger'] == 'edit') {

    $titulo = 'Editar Projeto';

    $sql = "SELECT * FROM projetos p WHERE id=". $_GET['row_id'][0];
    $listar = sqlQueries($conn, $sql, true)[0];

    $sql = "SELECT c.id, C.nome_completo, C.login, sta.descricao FROM foto.clientes C  INNER JOIN projetos_clientes PC ON C.id = PC.id_cliente  INNER JOIN status_registros sta ON C.id_statusregistro = sta.id WHERE PC.id_projeto =" . $_GET['row_id'][0];
    $listar_clientes = sqlQueries($conn, $sql, true);


    $action = $listar['id'];

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
        </ul>
        <div id="principal"><?php include_once 'objects/principal.php';?></div>
        <div id="clientes" class="col s12"><?php include_once 'objects/clientes.php'?></div>
    </div>

    <div class="iframe-footer">
        <button type="submit" class="green darken-2 right save-form" name="action" value="<?php echo $action; ?>"> <img src="../../../../images/icons/check-white.png"> Salvar</button>
        <button type="button" class="red darken-2 left" name="backscreen" value="controlador.php"> <img src="../../../../images/icons/close-white.png"> Cancelar</button>
    </div>
</form>