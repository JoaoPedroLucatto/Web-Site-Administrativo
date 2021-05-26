
    <div class="row">
        <div class="col s12 no-padding-left">
            <div class="col s12 m8 l8 inputbox">
                <input type="text" class="browser-default" name="busca" id="buscaCliente" required autocomplete="off">
                <label>Pesquisa de Cliente</label>
            </div>
            <div class="col s12 m4 l4 checkbox-exibir">
                <label>
                    <input type="checkbox" class="filled-in" name="exibir">
                    <span>Exibir todos Clientes</span>
                </label>
            </div>
        </div>
        <div class="col s12 list-content">
            <?php

            foreach ($listar_clientes as $row) {

            ?>
                <div class="col l4 m6 s12 no-padding-left cardbox_root">
                    <div class="col s12 cardbox">
                        <span class="title"> <?php echo $row['nome_completo']; ?> </span>

                        <div class="col l4 m5 s4 no-padding">
                            <span class="field-title truncate">Login:</span>
                            <span class="field-title truncate">Situação:</span>
                        </div>

                        <div class="col l6 m5 s6 no-padding">
                            <span class="field truncate"> <?php echo $row['login']; ?> </span>
                            <span class="field truncate"> <?php echo $row['descricao']; ?> </span>
                        </div>


                        <label class="checkbox">
                            <input type="checkbox" id="vinculaCliente" name="row_id[]" <?php 

                                foreach($listar_clientes_projeto as $row_two){

                                    if($row_two['id'] == $row['id']){

                                        echo 'checked';
                                        break;
                                    }
                                }
                            
                            ?> value="<?php echo $row['id'];?>">
                            <span></span>
                        </label>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>