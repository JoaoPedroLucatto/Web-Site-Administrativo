<div class="row">
    <div class="col s12 no-padding">
        <div class="col s12 m6 l6 inputbox">
            <input type="text" name="nome_sobre" class="browser-default" required autocomplete="off" maxlength="100" value="<?php echo $listar['nome_sobre'] ? $listar['nome_sobre'] : ''; ?>">
            <label>Nome</label>
        </div>
        <div class="col s12 m3 l3 inputbox">
            <input type="text" title="Insira somente o ID do Video" name="link_sobre" class="browser-default" required autocomplete="off" maxlength="1000" value="<?php echo $listar['link_video_sobre'] ? $listar['link_video_sobre'] : ''; ?>">
            <label>ID Vídeo <img class="tooltipped" data-position="top" data-tooltip="Informe somente o ID. Exemplo: https://www.youtube.com/watch?v=(ID) " src="../../../../images/icons/help_outline_black.png" width="18px" style="vertical-align: text-bottom;" > </label>
        </div>
        <div class="col s12 textareabox">
            <textarea name="descri_sobre" cols="30" rows="10"><?php echo $listar['texto_sobre'] ? $listar['texto_sobre'] : '';?></textarea>
            <label>Texto Sobre</label>
        </div>
    </div>
</div>