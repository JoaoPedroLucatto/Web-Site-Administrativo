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


<form method="GET" action="../../../../controller/administrativo/iframes/cliente/incluir_editar.php">
    <div class="row">
        <div class="s12">
            <div class="sub-header">
                <a class="title-sub-header"><img src="../../../../images/icons/person_add_black.png">Clientes</a>
            </div>
        </div>
    </div>
    <div class="col s12 iframe-content">
        <div class="row">
            <div id="main" class="col s12 no-padding">
                <div class="col l6 m8 s12 no-padding">
                    <div class="col l4 m4 s4  inputbox">
                        <input type="text" class="browser-default" disabled value="<?php echo isset($listar['id']) ? $listar['id'] :  ''; ?>">
                        <label>ID</label>
                    </div>

                    <div class="col s12 m8 l8 inputbox">
                        <input type="text" name="nomecompleto" class="browser-default" autocomplete="off" maxlength="100" required value="<?php echo isset($listar['nome_completo']) ? $listar['nome_completo'] : ""; ?>">
                        <label>Nome</label>
                    </div>

                    <div class="col l6 m6 s6 inputbox">
                        <input type="text" name="login" class="browser-default" autocomplete="off" maxlength="20" required value="<?php echo isset($listar['login']) ? $listar['login'] : ""; ?>">
                        <label>Login</label>

                    </div>

                    <div class="col l5 m5 s5 offset-l1 offset-m1 offset-s1 inputbox">
                        <input type="password" name="senha" class="browser-default" autocomplete="off" maxlength="50" <?php echo $_GET['trigger'] == 'edit' ? '' : 'required'; ?>>
                        <label>Senha</label>
                    </div>

                    <div class="col s12 inputbox">
                        <input type="text" name="email" class="browser-default" autocomplete="off" maxlength="200" <?php echo $_GET['trigger'] == 'edit' ? '' : 'required'; ?> value="<?php echo isset($listar['email']) ? $listar['email'] : ''; ?>">
                        <label>E-mail</label>
                    </div>
                </div>

                <div class="col s6 m3 l2 selectbox">
                    <select class="browser-default" name="statusregistro">
                        <option value="" disabled selected>Status Registro</option>
                        <?php

                        $sql = "SELECT * FROM status_registros WHERE id !=3";
                        $array_return = true;
                        $row2 = sqlQueries($conn, $sql, $array_return);


                        if (count($row2) > 0) {
                            foreach ($row2 as $row_two) {
                                $selected = $listar['id_statusregistro'] == $row_two['id'] ? 'selected' : '';
                                echo "<option value='" . $row_two['id'] . "'$selected> " . $row_two['descricao'] . " </option>";
                            }
                        } else {
                            echo '<option> Nenhum Status de Registro cadastrado... </option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col s12 m12 l5 textareabox">
                    <span class="titlebox">Feedback</span>
                    <label>
                        <input type="checkbox" name="checkbox-feedback" class="filled-in" <?php echo isset($listar['mostrar_feedback']) ? ($listar['mostrar_feedback'] == '1' ?  'checked=checked' : '') : ''; ?>>
                        <span>Mostra no Portfólio ?</span>
                    </label>
                    <textarea name="feedback" autocomplete="off" maxlength="2000" cols="80" rows="2000"><?php echo isset($listar['feedback']) ? $listar['feedback'] : ''; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="iframe-footer">
        <button type="submit" class="green darken-2 right save-form" name="action" value="<?php echo $action; ?>"> <img src="../../../../images/icons/check-white.png"> Salvar</button>
        <button type="button" class="red darken-2 left" name="backscreen" value="controlador.php"> <img src="../../../../images/icons/close-white.png"> Cancelar</button>
    </div>
</form>