<div class="row">
    <div class="col s12 no-padding">
        <div class="col s12 inputbox">
            <input type="text" name="email_contato" class="browser-default" autocomplete="off" maxlength="200" value="<?php echo $listar['email'] ? $listar['email'] : ''; ?>">
            <label>Email</label>            
        </div>
        <div class="col s8 m8 l10 inputbox">
            <input type="text" name="logradouro" class="browser-default" autocomplete="off" maxlength="200" value="<?php echo $listar['end_logradouro'] ? $listar['end_logradouro'] : ''; ?>">
            <label>Logradouro</label>
        </div>
        <div class="col s4 m4 l2 inputbox">
            <input type="text" name="numero" class="browser-default" autocomplete="off" maxlength="20" value="<?php echo $listar['end_numero'] ? $lsitar['end_numero'] : ''; ?>">
            <label>Numero</label>
        </div>
        <div class="col s6 m4 l3 inputbox">
            <input type="text" name="bairro" class="browser-default" autocomplete="off" maxlength="100" value="<?php echo $listar['end_bairro'] ? $listar['end_bairro'] : ''; ?>">
            <label>Bairro</label>
        </div>
        <div class="col s6 m5 l5 inputbox">
            <input type="text" name="cidade" class="browser-default" autocomplete="off" maxlength="100" value="<?php echo $listar['end_cidade'] ? $listar['end_cidade'] : ''; ?>">
            <label>Cidade</label>
        </div>
        <div class="col s12 m3 l4 inputbox">
            <input type="tel" name="telefone" class="browser-default" autocomplete="off"  maxlength="25" value="<?php echo $listar['telefone'] ? $listar['telefone'] : ''; ?>">
            <label>Telefone</label>
        </div>
    </div>
</div>