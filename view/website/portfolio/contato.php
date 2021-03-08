

<link rel="stylesheet" type="text/css" href="style/css/website/contato.css">


<div class="col s12 contato sector" data-scrolltop="contato">
    <span class="title"> FAÇA UM ORÇAMENTO CONOSCO! </span>

    <div class="col l8 m12 s12">
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
	    	<span class="value-field">contato@contato.com.br</span>

	    	<br>

	    	<span class="title-field">Telefone:</span>
	    	<span class="value-field">(99) 9.9999-9999</span>

	    	<br>

	    	<span class="title-field">Endereço:</span>
	    	<span class="value-field">Logradouro, 999, Bairro</span>
	    	<span class="value-field">Cidade, UF</span>
    	</div>

    	<div class="col l4 m4 s12">
	    	<div class="socialmedia">
	    		<a href="#" class="whatsapp"> <img src="images/icons/socialmedia/whatsapp.png"> </a>
	    		<a href="#" class="facebook"> <img src="images/icons/socialmedia/facebook.png"> </a>
	    		<a href="#" class="instagram"> <img src="images/icons/socialmedia/instagram.png"> </a>
	    		<a href="#" class="linkedin"> <img src="images/icons/socialmedia/linkedin.png"> </a>
	    	</div>
    	</div>
    </div>
</div>



<script type="text/javascript">
	$(document).ready(function() {
		new Lightpick({
            field: document.getElementsByName('data')[0],
            minDate: moment(),
            numberOfMonths: 2,
            dropdowns: {
                years: {
                    min: 2000,
                    max: 2200,
                },
                months: true,
            }
        });
	});
</script>