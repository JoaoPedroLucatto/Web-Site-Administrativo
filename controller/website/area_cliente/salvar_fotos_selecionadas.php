

<?php

	$maximo_imagens = 4;

	$retorno['code'] = 9;
	$retorno['message'] = "Ocorreu um erro ao tentar salvar as fotos selecionadas";

	
	include_once '../../../model/connect.php';



	if (isset($_POST['projeto_id']) && isset($_POST['fotos_selecionadas'])) {
		$projeto_id = $_POST['projeto_id'];
		$fotos_selecionadas = isset($_POST['fotos_selecionadas']) ? "'" . $_POST['fotos_selecionadas'] . "'" : 'null';
		
		
		$select = "UPDATE projetos 
					SET fotos_selecionadas = $fotos_selecionadas
					WHERE id = {$projeto_id}";
		$query = sqlQueries($conn, $select, false);


		if ($query) {
			$retorno['code'] = 1;
			$retorno['message'] = '';
		}
	}


	echo json_encode($retorno);

?>