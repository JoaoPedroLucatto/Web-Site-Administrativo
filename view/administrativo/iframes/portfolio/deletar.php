<form method="GET" action="../../../../controller/administrativo/iframes/portfolio/deletar.php">
    <div class="row">
        <div class="s12">
            <div class="sub-header">
                <a class="title-sub-header"><img src="../../../../images/icons/person_add_black.png">Exclusão de Portfólios</a>
            </div>
        </div>
    </div>

    <div class="col s12 iframe-content">
        <div class="row">
            <div class="col s12 no-padding-vertical">
                <span class="text"> Deseja confirmar a exclusão <?php echo count($_GET['row_id']) != 1 ? 'dos Portfólios selecionados?' : 'do Porfolio selecionado?'; ?></span>
            </div>

            <div class="col s12">
                <?php
                foreach ($_GET['row_id'] as $id) {

                    $sql = "SELECT port.id, port.titulo, port.tipo_registro, statu.descricao FROM portfolio port INNER JOIN status_registros statu on statu.id = port.id_statusregistro WHERE port.id = $id";
                    $row = sqlQueries($conn, $sql, true)[0];
                ?>
                    <div class="col l4 m6 s12 no-padding-left">
                        <div class="col s12 cardbox">
                            <span class="title"> <?php echo $row['titulo']; ?> </span>

                            <div class="col l4 m5 s4 no-padding">
                                <span class="field-title truncate">Tipo Registro:</span>
                                <span class="field-title truncate">Situação:</span>
                            </div>

                            <div class="col l6 m5 s6 no-padding">
                                <span class="field truncate"> <?php echo $row['tipo_registro'] == 1 ? 'Slider' : 'Portfólio'; ?> </span>
                                <span class="field truncate"> <?php echo $row['descricao']; ?> </span>
                            </div>


                            <label class="checkbox">
                                <input type="checkbox" checked="true" name="row_id[]" value="<?php echo $id; ?>">
                                <span></span>
                            </label>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


    <div class="iframe-footer">
        <button type="submit" class="green darken-2 right delete-form"> <img src="../../../../images/icons/check-white.png"> Confirmar</button>
        <button type="button" class="red darken-2 left" name="backscreen" value="controlador.php"> <img src="../../../../images/icons/close-white.png"> Cancelar</button>
    </div>
</form>