<?php
$titulo = 'Novo Usuário';

$action = 'new';

$campoid = 'hide';
$camponomecompleto = 'l12 m12 s12';

if ($_GET['trigger'] == 'edit') {

    $sql = "SELECT * FROM clientes WHERE id = " . $_GET['row_id'][0];
    $array_return = true;
    $listar = sqlQueries($conn, $sql, $array_return)[0];

    $titulo = 'Editar Usuário';

    $action = $listar['id'];

    //CASO SEJA EDIÇÃO, MOSTRA O ID E REDIMENSIONA OS DEMAIS
    $camponomecompleto = 'l9 m8 s8';
}
?>


<div class="row">
    <div class="col s12 no-padding">
        <div class="col s12 m8 l8 inputbox">
            <input type="text" class="browser-default" name="busca">
            <label>Pesquisa de Cliente</label>
        </div>

        <div class="col s12 m8 l8">
            <div class="col s12 m8 l8 resultbusca">
                

            </div>
        </div>
    </div>
</div>