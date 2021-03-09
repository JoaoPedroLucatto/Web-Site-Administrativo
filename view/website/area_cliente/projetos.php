


<?php
	$select = "SELECT client.id, client.nome_completo FROM clientes client WHERE client.id = ".$_SESSION['cliente_id'];
	$cliente = sqlQueries($conn, $select, true)[0];

	$horario = date('H');
	$saudacao = $horario >= 12 && $horario < 18 ? 'Boa tarde' : ($horario >= 0 && $horario < 12 ? 'Bom dia' : 'Boa noite');
?>

<link rel="stylesheet" type="text/css" href="style/css/website/area_cliente/projetos.css">
<link rel="stylesheet" type="text/css" href="style/css/website/area_cliente/projetos_modal.css">
<link rel="stylesheet" type="text/css" href="style/css/website/area_cliente/projetos_fullview.css">

<script type="text/javascript" src="style/js/website/area_cliente/projetos.js"></script>
<script type="text/javascript" src="style/js/website/area_cliente/projetos_modal.js"></script>
<script type="text/javascript" src="style/js/website/area_cliente/projetos_fullview.js"></script>


<div class="col s12 projetos">
	<span class="cliente nome"> <?php echo "$saudacao, ".ucwords(strtolower($cliente['nome_completo'])); ?> </span>

	<div class="projetoslist">
		<div class="item" data-projetoid='1'>
			<span class="title truncate">
				<img src="images/icons/folder-black.png">
				Projeto 1
			</span>
		</div>

		<div class="item" data-projetoid='2'>
			<span class="title truncate">
				<img src="images/icons/folder-black.png">
				Projeto 2
			</span>
		</div>

		<div class="item" data-projetoid='3'>
			<span class="title truncate">
				<img src="images/icons/folder-black.png">
				Projeto 3
			</span>
		</div>
	</div>
</div>



<div class="modal-background" data-modal='projeto'> </div>

<div class="my-modal lg" data-modal='projeto'>
    <span class="title">
        #
        <img src="images/icons/close-black.png" class="mymodal-close">
    </span>

    <div class="content">
        <div class="row">
            <div class="col s12">
                <span class="descricao value"> </span>
            </div>

            <div class="col s12 no-padding-horizontal fotoslist">
            	<div class="item" data-imageurl='#url_imagem' style="background-image: url(#url_imagem)">
            		<div class="tools">
            			<a href="#url_imagem" download data-action='download'> <img src="images/icons/download-white.png"> </a>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>


<div class="projeto-fullview">
	<img src="images/icons/close-white.png" class="close-fullview">

	<img src="#" class="picture">

	<div class="tools">
		<img src="images/icons/arrowleft-white.png" data-action='prev' class="left">

		<a href="#" download data-action='download'> <img src="images/icons/download-white.png"> </a>

		<img src="images/icons/arrowright-white.png" data-action='next' class="right">
	</div>
</div>