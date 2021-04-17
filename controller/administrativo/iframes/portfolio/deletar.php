<?php
    $messageToast = "Ocorreu um erro interno no sistema, contate o suporte apra análise";
    $statusToast = 9;


	if ($_GET['row_id']) {	
		include_once '../../../../model/connect.php';

		$text = '';
		$i = 0;

		foreach ($_GET['row_id'] as $id) {
			$text .= $i == 0 ? $id : ", ".$id;
			$i ++;
		}

		$update = "UPDATE portfolio SET id_statusregistro = 3 WHERE id IN ($text)";
		$array_return = false;
		$row = sqlQueries($conn , $update, $array_return);

		if ($row) {
			$messageToast = $i != 1 ? "Portólio excluídos" : "Portfólio excluído";
			$statusToast = 1;
		}
	}

	else {
		$messageToast = "Nenhum Portfólio selecionado para exclusão";
		$statusToast = 3;
	}
	
	header("location: ../../../../view/administrativo/iframes/portfolio/controlador.php?messageToast=$messageToast&statusToast=$statusToast");
?>