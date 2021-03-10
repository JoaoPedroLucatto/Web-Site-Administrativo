<?php
    $messageToast = "Ocorreu um erro interno no sistema, contate o suporte para análise";
    $statusToast = 9;


	if ($_GET['nomecompleto'] && $_GET['login']) {	
		include_once '../../../../model/connect.php';


		$usuario = $_SESSION['administrativo']['user_logged'];


		$nomecompleto = strtoupper(removeAccent($_GET['nomecompleto']));
		$login = strtoupper(removeSpace(removeAccent($_GET['login'])));
		$email = $_GET['email'];
		$checked_feedback = isset($_GET['checkbox-feedback']) ? '1' :  '0';
		$feedback = $_GET['feedback'];

		$statusregistro = $_GET['statusregistro'];


		$action = $_GET['action'];
		/* $continuarcadastrando = $_GET['continuarcadastrando'] ? 'new&continuarcadastrando=true' : 'null'; */

		//VERIFICA QUAL AÇÃO DEVE SEGUIR
		if ($action == 'new') {
			
			$sql = "SELECT * FROM clientes WHERE login = '$login' AND id_statusregistro != 3";
			$array_return  = true;
			$row = sqlQueries($conn, $sql, $array_return);
			
			if(count($row) == 0){

				$senha = password_hash(base64_encode($_GET['senha']), PASSWORD_BCRYPT);

				$sql = "INSERT INTO clientes (nome_completo, email, login, senha, feedback, mostrar_feedback, id_statusregistro ) values ('$nomecompleto', '$email', '$login', '$senha', '$feedback', '$checked_feedback', '$statusregistro');";
				$array_return = false;
				$row = sqlQueries($conn, $sql, $array_return);
	
				$text = "";
	
				$message = 'Novo Usuário cadastrado';
				$status = 1;

			}
			else{
				
				$messageToast = 'Usuário já possui cadastro';
				$statusregistro = 2; 
		
			}
		}

		else {
			$senha = isset($_GET['senha']) && strlen(trim($_GET['senha'])) > 0 ? "senha = '".(password_hash(base64_encode($_GET['senha']), PASSWORD_BCRYPT))."'," : "";

			$sql = "UPDATE clientes SET nome_completo = '$nomecompleto', email = '$email', $senha feedback = '$feedback', mostrar_feedback = $checked_feedback, id_statusregistro = $statusregistro WHERE id = $action";
			$array_return = false;
			$row = sqlQueries($conn, $sql, $array_return);
			
			$messageToast = $row;
			$message = "Usuário atualizado";
			$status = 1;
		}
	}

	header("location: ../../../../view/administrativo/iframes/cliente/controlador.php?messageToast=$messageToast&statusToast=$statusToast&trigger=$continuarcadastrando");
?>