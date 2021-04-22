

<link rel="stylesheet" type="text/css" href="style/css/website/contato.css">

<script type="text/javascript" src="style/js/website/contato.js"></script>


<div class="col s12 contato sector" data-scrolltop="contato">
    <span class="title"> FAÇA UM ORÇAMENTO CONOSCO! </span>

    <div class="col l8 m12 s12 formulario">
    	<div class="col l6 m6 s12 inputbox">
    		<input type="text" name="nome" class="browser-default">
    		<label>Nome</label>
    	</div>

    	<div class="col l6 m6 s12 inputbox">
    		<input type="text" name="nome_conjuge" class="browser-default">
    		<label>Nome do Cônjuge</label>
    	</div>

    	<div class="col l6 m6 s12 inputbox">
    		<input type="email" name="email" class="browser-default">
    		<label>E-mail</label>
    	</div>

    	<div class="col l6 m6 s12 inputbox">
    		<input type="text" name="celular" class="browser-default cellphone-mask">
    		<label>Celular</label>
    	</div>

    	<div class="col l6 m6 s12 inputbox">
    		<input type="text" name="evento" class="browser-default">
    		<label>Evento</label>
    	</div>

    	<div class="col l6 m6 s12 inputbox">
    		<input type="text" name="data" class="browser-default date-mask">
    		<label>Data</label>
    	</div>

    	<div class="col s12 textareabox">
    		<textarea name="informacoes"></textarea>
    		<label>Me conta, o que vai rolar nesse evento?</label>
    	</div>

        <div class="col s12 center">
            <button class="grey darken-4"> <img src="images/icons/check-white.png"> Enviar </button>
        </div>
    </div>

    <div class="col l4 m12 s12">
    	<div class="col l8 m8 s12">
	    	<span class="title-field">E-mail:</span>
	    	<span class="value-field"><?php echo $config_array['email']; ?></span>

	    	<br>

	    	<span class="title-field">Telefone:</span>
	    	<span class="value-field"><?php echo $config_array['telefone']; ?></span>

	    	<br>

            <?php

                $endereco = '';
                $cidade = '';


                if (!empty($config_array['end_logradouro'])) {
                    $endereco = $config_array['end_logradouro'];

                    if (!empty($config_array['end_numero'])) {
                        $endereco .= ', ' . $config_array['end_numero'];
                    }

                    if (!empty($config_array['end_bairro'])) {
                        $endereco .= ', ' . $config_array['end_bairro'];
                    }
                }



                if (!empty($config_array['end_cidade'])) {
                    $cidade = $config_array['end_cidade'];
                }

            ?>

	    	<span class="title-field">Endereço:</span>
	    	<span class="value-field"> <?php echo $endereco; ?> </span>
	    	<span class="value-field"> <?php echo $cidade; ?> </span>
    	</div>

    	<div class="col l4 m4 s12">
	    	<div class="socialmedia">
                <?php

                    if (!empty($config_array['whatsapp'])) {
                        $whatsapp = '55' . preg_replace('/[^0-9]/', '', $config_array['whatsapp']);
                        echo "<a href='https://wa.me/{$whatsapp}?text=' class='whatsapp' target='_blank'> <img src='images/icons/socialmedia/whatsapp.png'> </a>";
                    }

                    if (!empty($config_array['facebook'])) {
                        echo "<a href='{$config_array['facebook']}' class='facebook' target='_blank'> <img src='images/icons/socialmedia/facebook.png'> </a>";
                    }

                    if (!empty($config_array['instagram'])) {
                        echo "<a href='{$config_array['instagram']}' class='instagram' target='_blank'> <img src='images/icons/socialmedia/instagram.png'> </a>";
                    }

                    if (!empty($config_array['linkedin'])) {
                        echo "<a href='{$config_array['linkedin']}' class='linkedin' target='_blank'> <img src='images/icons/socialmedia/linkedin.png'> </a>";
                    }

                ?>
	    	</div>
    	</div>
    </div>
</div>

