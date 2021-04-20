<div class="row">
    <div class="s12 no-padding">
        <div class="s12 inputbox">
            <input type="text" name="nome_empresa" class="browser-default" autocomplete="off" maxlength="200" value="<?php echo $listar['nome_empresa'] ? $listar['nome_empresa'] : '' ;?>">
            <label>Nome do Empreendimento</label>
        </div>

        <div class="col s12 imagembox" id="upload-imagem">
            <div class="imagem">
                <img id="preview" class="img" <?php echo file_exists($img_logo) ? "src=$img_logo" : '' ;?>>
                <span class="textbox"><img src="../../../../images/icons/photo_camera_white.png">Inserir / Editar Foto</span>
                <span class="removeimg"><img src="../../../../images/icons/close-white.png"></span>
            </div>
            <input type="file" name="upload-imagem[]" id="upload" accept="png">
        </div>
    </div>
</div>