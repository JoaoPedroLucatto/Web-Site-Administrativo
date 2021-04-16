
<form enctype="multipart/form-data" method="post" action="../../../../controller/administrativo/configuracao/incluir_editar.php">
    <div class="row">
        <div class="s12">
            <div class="sub-header">
                <a class="title-sub-header"><img src="../../../../images/icons/build_black.png">Configurações</a>
            </div>
        </div>
    </div>

    <div class="col s12 iframe-content">
        <ul class="tabs">
            <li class="tab"><a href="#sobre">Sobre</a></li>
            <li class="tab"><a href="#contato">Contato</a></li>
            <li class="tab"><a href="#redessociais">Redes Sociais</a></li>
        </ul>
        <div id="sobre"><?php include_once'objects/sobre.php';?></div>
        <div id="contato"><?php include_once'objects/contato.php'; ?></div>
        <div id="redessociais"><?php include_once'objects/redes.php';?></div>
    </div>

    <div class="iframe-footer">
        <button type="submit" class="green darken-2 right save-form" name="action" value="<?php echo $action; ?>"> <img src="../../../../images/icons/check-white.png"> Salvar</button>
        <button type="button" class="red darken-2 left" name="backscreen" value="controlador.php"> <img src="../../../../images/icons/close-white.png"> Cancelar</button>
    </div>

</form>