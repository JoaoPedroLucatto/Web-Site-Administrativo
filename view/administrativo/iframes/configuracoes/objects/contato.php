<div class="row">
    <div class="col s12 no-padding">
        <div class="col s12 inputbox">
            <input type="email" name="email_contato" class="browser-default" required autocomplete="off" maxlength="200" value="<?php echo $listar['email'] ? $listar['email'] : ''; ?>">
            <label>Email</label>            
        </div>
        <div class="col s8 m8 l10 inputbox">
            <input type="text" name="logradouro_contato" class="browser-default" autocomplete="off" maxlength="200" value="<?php echo $listar['end_logradouro'] ? $listar['end_logradouro'] : ''; ?>">
            <label>Logradouro</label>
        </div>
        <div class="col s4 m4 l2 inputbox">
            <input type="text" name="numero_contato" class="browser-default" autocomplete="off" maxlength="20" value="<?php echo $listar['end_numero'] ? $listar['end_numero'] : ''; ?>">
            <label>Numero</label>
        </div>
        <div class="col s6 m4 l3 inputbox">
            <input type="text" name="bairro_contato" class="browser-default" autocomplete="off" maxlength="100" value="<?php echo $listar['end_bairro'] ? $listar['end_bairro'] : ''; ?>">
            <label>Bairro</label>
        </div>
        <div class="col s6 m5 l5 inputbox">
            <input type="text" name="cidade_contato" class="browser-default" autocomplete="off" maxlength="100" value="<?php echo $listar['end_cidade'] ? $listar['end_cidade'] : ''; ?>">
            <label>Cidade</label>
        </div>
        <div class="col s12 m3 l4 inputbox">
            <input type="tel" name="telefone_contato" class="browser-default cellphone-mask" autocomplete="off"  maxlength="25" data-mask="(00) 00000-0000" value="<?php echo $listar['telefone'] ? $listar['telefone'] : ''; ?>">
            <label>Celular</label>
        </div>
    </div>
</div>