<?php
$titulo = 'Novo Usuário';

$continuarcadastrando = '';
$action = 'new';

$campoid = 'hide';
$camponomecompleto = 'l12 m12 s12';

if ($_GET['trigger'] == 'edit') {

    $sql = "SELECT * FROM clientes WHERE id = " . $_GET['row_id'][0];
    $array_return = true;
    $listar = sqlQueries($conn, $sql, $array_return)[0];

    $titulo = 'Editar Usuário';

    $continuarcadastrando = 'hide';
    $action = $listar['id'];

    //CASO SEJA EDIÇÃO, MOSTRA O ID E REDIMENSIONA OS DEMAIS
    $campoid = '';
    $camponomecompleto = 'l9 m8 s8';
}
?>


<form method="GET" action="../../../../controller/administrativo/iframes/prejetos/incluir_editar.php">
    <div class="row">
        <div class="s12">
            <div class="sub-header">
                <a class="title-sub-header"><img src="../../../../images/icons/folder-black.png">Projetos</a>
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