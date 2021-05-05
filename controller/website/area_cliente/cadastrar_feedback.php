

<?php

	$retorno['code'] = 9;
	$retorno['message'] = "Ocorreu um erro ao tentar salvar o feedback";

	
	include_once '../../../model/connect.php';




	if (isset($_POST['feedback_text'])) {
		$cliente_id = $_SESSION['cliente_id'];
		$feedback_text = $_POST['feedback_text'];

		$update = "UPDATE clientes SET 
					feedback = '$feedback_text',
					mostrar_feedback = false,
					alteracoes_feedback = true
					WHERE id = $cliente_id";
		$query = sqlQueries($conn, $update, false);

		if ($query) {
			$retorno['code'] = 1;
			$retorno['message'] = 'Informações salvas <br> Agradecemos pelo seu feedback';
		}
	}



	echo json_encode($retorno);

?>