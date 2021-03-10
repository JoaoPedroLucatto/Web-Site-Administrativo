

<!-- CSS -->
<link rel="stylesheet" href="../../../../style/css/materialize-framework.css">
<link rel="stylesheet" href="../../../../style/css/administrativo/iframes/iframe.css">
<link rel="stylesheet" href="../../../../style/css/objects/fields.css">
<link rel="stylesheet" href="../../../../style/css/objects/lightpick.css">
<link rel="stylesheet" href="../../../../style/css/objects/loading.css">
<link rel="stylesheet" href="../../../../style/css/administrativo/objects/sub-header.css">
<link rel="stylesheet" href="../../../../style/css/administrativo/objects/upload.css">
<link rel="stylesheet" href="../../../../style/css/administrativo/objects/tabs.css">


<!-- JAVASCRIPT -->
<script type="text/javascript" src="../../../../style/js/jquery.js"></script>
<script type="text/javascript" src="../../../../style/js/jquery-ui.js"></script>
<script type="text/javascript" src="../../../../style/js/materialize-framework.js"></script>
<script type="text/javascript" src="../../../../style/js/materialize-init.js"></script>
<script type="text/javascript" src="../../../../style/js/moment.js"></script>
<script type="text/javascript" src="../../../../style/js/objects/fields.js"></script>
<script type="text/javascripr" src="../../../../style/js/objects/loading.js"></script>
<script type="text/javascript" src="../../../../style/js/administrativo/iframes/iframe.js"></script>


<?php

	include_once '../../../../model/connect.php';

	/* $permissions = getPermissions($conn, '2.9.', null); */

	//REDIRECIONA PARA A TELA DE INCLUIR
	if (isset($_GET['trigger']) && ($_GET['trigger'] == 'new' || $_GET['trigger'] == 'edit')) {
		$arquivo = 'incluir_editar.php';
	}

	//REDIRECIONA PARA A TELA DE REMOÇÃO
	else if (isset($_GET['trigger']) && $_GET['trigger'] == 'delete') {
		$arquivo = 'deletar.php';
	}

	//REDIRECIONA PARA A LISTA PADRÃO
	else {
		$arquivo = 'listar.php';
	}


	include_once $arquivo;



	/* //INCLUI A PESQUISA DENTRO DA TABELA
	$dir_raiz = '../../../../';
	include_once '../../objects/search-table.php'; */



	//EXIBIÇÃO DAS MENSAGENS
    if (!empty($_GET['messageToast']) && $_GET['statusToast'] != 0) {
        echo "<script> window.parent.showToast(".$_GET['statusToast'].", '".$_GET['messageToast']."'); </script>";
    }
?>