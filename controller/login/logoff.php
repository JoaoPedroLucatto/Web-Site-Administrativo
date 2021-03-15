

<?php

	session_start();


	try {
		unset($_SESSION['usuario_id'], $_SESSION['cliente_id']);

		$retorno['code'] = 1;
		$retorno['message'] = '';
	} catch(Exception $ex) {
		$retorno['code'] = 2;
		$retorno['message'] = 'Não foi possível realizar o Logoff';
	}
	

	echo json_encode($retorno);
?>