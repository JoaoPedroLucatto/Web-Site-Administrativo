<div class="row">
    <div class="col s12 no-padding">
        <div class="col s12 m6 l6 inputbox">
            <input type="text" name="nome_sobre" class="browser-default" required autocomplete="off" maxlength="100" value="<?php echo $lsitar['nome_sobre'] ? $lsitar['nome_sobre'] : ''; ?>">
            <label>Nome</label>
        </div>
        <div class="col s12 m6 l6 inputbox">
            <input type="text" name="link_sobre" class="browser-default" required autocomplete="off" maxlength="1000" value="<?php echo $lsitar['link_video_sobre'] ? $lsitar['link_video_sobre'] : ''; ?>">
            <label>Link Video</label>
        </div>
        <div class="col s12 textareabox">
            <textarea name="text_sobre" cols="30" rows="10"><?php echo $listar['texto_sobre'] ? $listar['texto_sobre'] : '';?></textarea>
            <label>Descrição</label>
        </div>
    </div>
</div>