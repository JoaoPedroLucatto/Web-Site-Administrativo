

<?php
	$retorno['code'] = 2;
	$retorno['message'] = 'Usuário e/ou Senha digitados inválidos';


	include_once '../../model/connect.php';


	if ($_POST['login'] && $_POST['senha']) {
		unset($_SESSION['usuario_id'], $_SESSION['cliente_id']);

		$login = strtoupper(removeSpace(removeAccent($_POST['login'])));
		$senha = base64_encode($_POST['senha']);


		//VERIFICA SE TEM USUÁRIOS CADASTRADOS
		$select = "SELECT users.id, users.senha FROM usuarios users WHERE users.login = '$login' AND users.id_statusregistro IN (1)";
		$query = sqlQueries($conn, $select, true);

		if (count($query) > 0) {
			foreach ($query as $usuario) {
				if (password_verify($senha, $usuario['senha'])) {
					$_SESSION['usuario_id'] = $usuario['id'];
					break;
				}
			}
		}

		//VERIFICA SE TEM CLIENTES
		else {
			$select = "SELECT client.id, client.senha FROM clientes client WHERE client.login = '$login' AND client.id_statusregistro IN (1)";
			$query = sqlQueries($conn, $select, true);

			if (count($query) > 0) {
				foreach ($query as $cliente) {
					if (password_verify($senha, $cliente['senha'])) {
						$_SESSION['cliente_id'] = $cliente['id'];
						break;
					}
				}
			}
		}


		if (isset($_SESSION['usuario_id']) || isset($_SESSION['cliente_id'])) {
			$retorno['code'] = 1;
			$retorno['message'] = '';
		}
	}


	echo json_encode($retorno);
?>