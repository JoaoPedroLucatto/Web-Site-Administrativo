<div class="row">
    <div class="col s12 no-padding">
        <div class="col s12 m6 l6 inputbox">
            <input type="text" name="facebook" class="browser-default" autocomplete="off" maxlength="200" value="<?php echo $listar['facebook'] ? $listar['facebook'] : ''; ?>">
            <label>Link Facebook</label>
        </div>
        <div class="col s12 m6 l6 inputbox">
            <input type="text" name="instagram" class="browser-default" autocomplete="off" maxlength="200" value="<?php echo $listar['instagram'] ? $listar['instagram'] : ''; ?>">
            <label>Link Instagram</label>
        </div>
        <div class="col s5 m4 l3 inputbox">
            <input type="tel" name="whatsapp" class="browser-default cellphone-mask" autocomplete="off" maxlength="50" value="<?php echo $listar['whatsapp'] ? $listar['whatsapp'] : ''; ?>">
            <label>WhatsApp</label>
        </div>
        <div class="col s7 m8 l9 inputbox">
            <input type="text" name="linkdin" class="browser-default" autocomplete="off" maxlength="200" value="<?php echo $listar['linkedin'] ? $listar['linkedin'] : ''; ?>">
            <label>Linkedin</label>
        </div>
    </div>
</div>