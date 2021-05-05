


<?php
	$select = "SELECT client.id, client.nome_completo, client.feedback FROM clientes client WHERE client.id = ".$_SESSION['cliente_id'];
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
		<?php
			$select = "SELECT 
						proj.id, proj.titulo, proj.descricao
						FROM projetos proj
						LEFT JOIN projetos_clientes projclient
							ON projclient.id_projeto = proj.id
						WHERE 
							projclient.id_cliente = {$_SESSION['cliente_id']}
							AND proj.id_statusregistro IN (1)
						ORDER BY 
							proj.id ASC";
			$projetos_array = sqlQueries($conn, $select, true);


			if (count($projetos_array) > 0) {
				foreach ($projetos_array as $projeto) {
		?>
					<div class="item" data-projetoid='<?php echo $projeto['id']; ?>'>
						<span class="title truncate">
							<img src="images/icons/folder-black.png">
							<?php echo ucwords(strtolower($projeto['titulo'])); ?>
						</span>
					</div>
		<?php
				}
			}

			else {
		?>
				<div class="col s12 center">
					<span class="vazio"> Nenhum Projeto encontrado para visualização... </span>
				</div>
		<?php
			}
		?>
	</div>
</div>



<div class="modal-background" data-modal='projeto'> </div>

<div class="my-modal lg" data-modal='projeto'>
    <span class="title">
        <span class="value"> # </span>

        <img src="images/icons/close-black.png" class="mymodal-close">
        
        <a class="download-projetocompleto" href="#" download="#">
        	<img src="images/icons/download-black.png" class="tooltipped" data-position='left' data-tooltip='Baixar projeto completo'>
        </a>
    </span>

    <div class="content">
        <div class="row">
            <div class="col s12">
                <span class="descricao value"> # </span>
            </div>

            <div class="col s12 no-padding-horizontal fotoslist"> </div>
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