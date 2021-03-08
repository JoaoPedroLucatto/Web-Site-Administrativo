<form action="../../../../../controller/administrativo/iframes/projetos/incluir_editar.php" method="get">

    <div class="row">
        <div class="col s12 no-padding">
            <div class="col s12 m8 l8">
                <div class="col s12 m3 l3 inputbox no-padding">
                    <input type="text" class="browser-default" disabled value="<?php echo empty($listar['id']) ? '' : $listar['id']; ?>">
                    <label>ID</label>
                </div>

                <div class="col s12 m9 l9 inputbox">
                    <input type="text" class="browser-default" maxlength="100" autocomplete="off" name="titulo" require value="<?php echo empty($listar['titulo']) ? '' : $listar['titulo']; ?>">
                    <label>Titulo</label>
                </div>                

                <div class="col s12 textareabox">
                    <span class="title">Descrição</span>
                    <textarea name="descricao" class="browser-default" maxlength="100" autocomplete="off" cols="100 " rows="100"><?php echo empty($listar['descricao']) ? '' : $listar['descricao']; ?></textarea>
                </div>
            </div>

            <div class="col s6 m4 l4 selectbox">
                <span class="title">Status Registro</span>
                <select class="browser-default" name="statusregistro">
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

            <div class="col s6 m4 l4 upload-arquivo">
                    <label for="arquivo"><img src="../../../../images/icons/file-upload-white.png">Upload</label>
                    <input type="file" name="arquivo" id="arquivo">
                </div>
        </div>
    </div>
</form>