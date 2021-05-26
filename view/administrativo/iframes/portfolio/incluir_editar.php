<?php
$titulo = 'Novo Portfólio';

$action = 'new';

$campoid = 'hide';

if ($_GET['trigger'] == 'edit') {

    $titulo = 'Editar Portfólio';

    $sql = "SELECT * FROM portfolio  WHERE id=" . $_GET['row_id'][0];
    $listar = sqlQueries($conn, $sql, true)[0];

    $action = $listar['id'];

    $diretorio = '../../../../uploads/website/';
    
    $dir_imagem = $listar['tipo_registro'] == 1 ? "$diretorio"."slider_".$_GET['row_id'][0].'.'.$listar['extensao_img'] : "$diretorio"."portfolio_".$_GET['row_id'][0].'.'.$listar['extensao_img'];

}
?>


<form enctype="multipart/form-data" method="POST" action="../../../../controller/administrativo/iframes/portfolio/incluir_editar.php">
    <div class="row">
        <div class="s12">
            <div class="sub-header">
                <a class="title-sub-header"><img src="../../../../images/icons/card_travel_black.png"><?php echo $titulo ?></a>
            </div>
        </div>
    </div>
    <div class="col s12 iframe-content">
        <div class="row">
            <div id="main" class="col s12">
                <div class="col l6 m6 s12 no-padding">

                    <div class="col s6 m6 l6 selectbox">
                        <label>Tipo de Registro</label>
                        <select class="browser-default" name="tipo_registro">

                            <option value="1" default <?php echo $listar['tipo_registro'] == 1 ? 'selected' : ''; ?>>Slider</option>
                            <option value="2" <?php echo $listar['tipo_registro'] == 2 ? 'selected' : ''; ?>>Portfólio</option>
                        </select>
                    </div>

                    <div class="col l6 m6 s6 selectbox">
                        <label>Status Registro</label>
                        <select class="browser-default" name="statusregistro">
                            <?php

                            $sql = "SELECT * FROM status_registros WHERE id != 3";
                            $query_status = sqlQueries($conn, $sql, true);


                            foreach ($query_status as $status) {
                                $select = $listar['id_statusregistro'] == $status['id'] ? 'selected' : '';
                                echo "<option value= '" . $status['id'] . "'$select>" . $status['descricao'] . "</option>";
                            }

                            ?>
                        </select>
                    </div>


                    <div class="col l2 m2 s4 inputbox">
                        <input type="text" class="browser-default" disabled value="<?php echo isset($listar['id']) ? $listar['id'] :  ""; ?>">
                        <label>ID</label>
                    </div>

                    <div class="col l10 m10 s8 inputbox">
                        <input type="text" name="titulo" class="browser-default" required autocomplete="off" maxlength="100" value="<?php echo isset($listar['titulo']) ? $listar['titulo'] : ""; ?>">
                        <label>Titulo</label>
                    </div>

                    <div class="col s12 inputbox" id="subtitulo_1">
                        <input type="text" name="subtitulo_1" class="browser-default" autocomplete="off" maxlength="100" value="<?php echo isset($listar['subtitulo_1']) ? $listar['subtitulo_1'] : ""; ?>">
                        <label>Subtítulo 1</label>

                    </div>

                    <div class="col s12 inputbox" id="subtitulo_2">
                        <input type="text" name="subtitulo_2" class="browser-default" autocomplete="off" maxlength="100" value="<?php echo isset($listar['subtitulo_2']) ? $listar['subtitulo_2'] : ""; ?>">
                        <label>Subtítulo 2</label>
                    </div>

                    <div class="col s12 m6 l6 selectbox" id="cor_texto">
                        <label>Cor do Texto</label>
                        <select class="browser-default" name="cor_texto" required>
                            <option value="1" default <?php echo $listar['cor_texto'] == 1 ? 'selected' : '';?>>Branca</option>
                            <option value="2" <?php echo $listar['cor_texto'] == 2 ? 'selected' : '';?>>Preta</option>
                        </select>
                    </div>

                    <div class="col s12 m6 l6 selectbox" id="posicao_texto" required>
                        <label>Posição do Texto</label>
                        <select class="browser-default" name="posicao_texto">
                            <option value="1" default <?php echo $listar['posicao_texto'] == 1 ? 'selected' : '';?>>Esquerda</option>
                            <option value="2" <?php echo $listar['posicao_texto'] == 2 ? 'selected' : '';?>>Centro</option>
                            <option value="3"  <?php echo $listar['posicao_texto'] == 3 ? 'selected' : '';?>>Direita</option>
                        </select>
                    </div>
                </div>
                <div class="col s12 m6 l6 no-padding">
                    <div class="col s12 inputbox" id="link_video">
                        <input type="text" name="link_video" class="browser-default" required autocomplete="off" maxlength="100" value="<?php echo $listar['link_video'] ? $listar['link_video'] : ''; ?>">
                        <label>ID Vídeo <img class="tooltipped" data-position="top" data-tooltip="Informe somente o ID. Exemplo: https://www.youtube.com/watch?v=(ID) " src="../../../../images/icons/help_outline_black.png" width="13px" style="vertical-align: baseline;" > </label>
                    </div>
                    <div class="col s12 imagembox" id="upload_imagem">
                        <div class="imagem" id="teste">
                            <img id="preview" class="img" <?php echo file_exists($dir_imagem) ? "src=$dir_imagem" : 'src'; ?>>
                            <span class="textbox"><img src="../../../../images/icons/photo_camera_white.png">Inserir / Editar Foto</span>
                            <span class="removeimg"><img src="../../../../images/icons/close-white.png"></span>
                        </div>                        
                        <input type="file" name="upload-imagem[]" id="upload" accept=".jpeg, .jpg" <?php echo $listar['link_video'] ? 'disabled' : ''; ?>>
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
<script>
    $(document).ready(function() {

        /* PREVIEW DA IMAGEM */
        $('input:file#upload').on('change', function() {

            var extencoes = ['JPEG', 'JPG'];
            var file = $(this)[0].files[0];
            var extencao_file = file.name.split('.').pop().toUpperCase();
            var fileReader = new FileReader();

            if($.inArray(extencao_file, extencoes) >= 0){

                fileReader.onloadend = function() {

                    $('img#preview').attr('src', fileReader.result);

                }           
            }
            else{

                window.parent.showToast(3,'Formato Permitidos: jpeg, jpg');
            }

            fileReader.readAsDataURL(file);
            $('input[name="link_video"]').prop('disabled', true);
        });



        /* EVENTO LAÇADO NO TIPO DE REGISTRO */
        $('select[name="tipo_registro"] option:selected').trigger('change');


        /* EVENTO DE CLICK INPUT:FILE */
        $('span.textbox').click(function() {

            $('input:file#upload').trigger('click');

        });

        /* REMOVE IMAGEM DO PREVIEW */
        $('span.removeimg > img').on('click', function(){

            $('img#preview').removeAttr('src');
            $('input[name="link_video"]').prop('disabled', false);

        });


        /* OCULTA O INPUT:FILE QUANDO POSSUIR UM LINK */
        $('input[name="link_video"]').on('keyup', function() {

            var link = $(this).val();

            if (!link) {

                $('input:file#upload').prop('disabled', false);

            } else {

                $('input:file#upload').prop('disabled', true);

            }
        });

        //ALERTA PERMITIDO SOMENTE IMAGEM OU VIDEO
        $('input:file#upload').on('click', function() {

            if ($(this).prop('disabled')) {

                window.parent.showToast(3, "É permitido apenas um Link ou uma Imagem !");

            }
        });


        //VERIFICA AS TAG IMG DO PORTIFOLIO E SLIDER (OBRIGATORIEDADE)
        $('button.save-form').on('click', function(){ 
            let tipo_registro =  $('select[name="tipo_registro"]').val();
            let imgsrc = $('img#preview.img').attr('src');

            if(tipo_registro == 1){

                if(imgsrc == ""){
                    window.parent.showToast('3','Tipo de Registro Slider é obrigatório uma imagem !');
                    return false;
                }

            }
            else{

                let inputVideo = $('input[name=link_video]').val().trim();

                if(inputVideo.length == 0 && imgsrc == ""){

                    window.parent.showToast('3', 'É Obrigatório um vídeo ou imagem !');
                    return false;

                }
            }
        });      
    });
</script>