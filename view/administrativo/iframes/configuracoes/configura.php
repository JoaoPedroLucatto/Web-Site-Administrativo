<?php

$sql = "SELECT * FROM configuracoes WHERE id = 1";
$listar = sqlQueries($conn, $sql, true)[0];

$img_logo = '../../../../images/logo.png';

?>


<form enctype="multipart/form-data" method="post" action="../../../../controller/administrativo/iframes/configuracao/configuracao.php">
    <div class="row">
        <div class="s12">
            <div class="sub-header">
                <a class="title-sub-header"><img src="../../../../images/icons/build_black.png">Configurações</a>
            </div>
        </div>
    </div>

    <div class="col s12 iframe-content">
        <ul class="tabs">
            <li class="tab"><a href="#empresa">Empresa</a></li>
            <li class="tab"><a href="#sobre">Sobre</a></li>
            <li class="tab"><a href="#contato">Contato</a></li>
            <li class="tab"><a href="#redessociais">Redes Sociais</a></li>
        </ul>
        <div id="empresa"><?php include_once 'objects/empresa.php'; ?></div>
        <div id="sobre"><?php include_once 'objects/sobre.php'; ?></div>
        <div id="contato"><?php include_once 'objects/contato.php'; ?></div>
        <div id="redessociais"><?php include_once 'objects/redes.php'; ?></div>
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

            var extencoes = ['PNG'];
            var file = $(this)[0].files[0];
            var extencao_file = file.name.split('.').pop().toUpperCase();
            var fileReader = new FileReader();

            if ($.inArray(extencao_file, extencoes) >= 0) {

                fileReader.onloadend = function() {

                    $('img#preview').attr('src', fileReader.result);

                }
            } else {

                window.parent.showToast(3, 'Formato Permitidos: png');
            }

            fileReader.readAsDataURL(file);
        });


        /* EVENTO DE CLICK INPUT:FILE */
        $('span.textbox').click(function() {

            $('input:file#upload').trigger('click');

        });


        /* REMOVE IMAGEM DO PREVIEW */
        $('span.removeimg > img').on('click', function() {

            $('img#preview').removeAttr('src');

        });
    });
</script>