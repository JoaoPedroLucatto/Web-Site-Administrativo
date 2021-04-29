<?php

$titulo = 'Contato';

$sql = "SELECT * FROM website_contato WHERE id = " . $_GET['row_id'][0];
$listar = sqlQueries($conn, $sql, true)[0];

$continuarcadastrando = 'hide';
$action = $listar['id'];

?>


<form method="get" action="../../../../controller/administrativo/iframes/contato/edit.php">
    <div class="row">
        <div class="s12">
            <div class="sub-header">
                <a class="title-sub-header"><img src="../../../../images/icons/money_black.png"><?php echo $titulo ?></a>
            </div>
        </div>
    </div>
    <div class="col s12 iframe-content">
        <div class="row">
            <div id="main" class="col s12">
                <div class="col l10 m12 s12 no-padding">
                    <div class="col s12">
                        <label>
                            <input type="checkbox" name="checkbox-visto" class="filled-in" <?php echo $listar['visto'] == '1' ?  'checked=checked' : ''; ?>>
                            <span>Marcar como Visto ?</span>
                        </label>
                    </div>
                    <div class="col l6 m6 s12 inputbox">
                        <input type="text" name="nome" class="browser-default" autocomplete="off" maxlength="100" disabled value="<?php echo isset($listar['nome']) ? $listar['nome'] : ""; ?>">
                        <label>Nome</label>
                    </div>

                    <div class="col l6 m6 s12 inputbox">
                        <input type="text" name="nome_conjugre" class="browser-default" autocomplete="off" maxlength="100" disabled value="<?php echo $listar['nome_conjuge'] ? $listar['nome_conjuge'] : ""; ?>">
                        <label>Nome Cônjugre</label>

                    </div>

                    <div class="col l6 m6 s12 inputbox">
                        <input type="email" name="email" class="browser-default" autocomplete="off" maxlength="200" disabled value="<?php echo $listar['email'] ? $listar['email'] : ''; ?>">
                        <label>Email</label>
                    </div>

                    <div class="col l6 m6 s12 inputbox">
                        <input type="text" name="celular" class="browser-default cellphone-mask" autocomplete="off" maxlength="25" disabled value="<?php echo $listar['celular'] ? $listar['celular'] : ''; ?>">
                        <label>Celular</label>
                    </div>

                    <div class="col l6 m6 s12 inputbox">
                        <input type="text" name="evento" class="browser-default cellphone-mask" autocomplete="off" maxlength="50" disabled value="<?php echo $listar['evento'] ? $listar['evento'] : ''; ?>">
                        <label>Evento</label>
                    </div>

                    <div class="col l6 m6 s12 inputbox">
                        <input type="text" name="data" class="browser-default cellphone-mask" autocomplete="off" disabled value="<?php echo $listar['data'] ? $listar['data'] : ''; ?>">
                        <label>Data</label>
                    </div>

                    <div class="col s12 textareabox">
                        <textarea name="descricao" disabled><?php echo $listar['observacoes'] ? $listar['observacoes'] : ''; ?></textarea>
                        <label>Descrição</label>
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