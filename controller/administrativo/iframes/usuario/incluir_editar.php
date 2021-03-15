<?php
    $messageToast = "Ocorreu um erro interno no sistema, contate o suporte para análise";
    $statusToast = 9;


	if ($_GET['nomecompleto'] && $_GET['login']) {	
		include_once '../../../../model/connect.php';


		$usuario = $_SESSION['administrativo']['user_logged'];


		$nomecompleto = strtoupper(removeAccent($_GET['nomecompleto']));
		$login = strtoupper(removeSpace(removeAccent($_GET['login'])));

		$statusregistro = $_GET['statusregistro'];


		$action = $_GET['action'];
		/* $continuarcadastrando = $_GET['continuarcadastrando'] ? 'new&continuarcadastrando=true' : 'null'; */

		//VERIFICA QUAL AÇÃO DEVE SEGUIR
		if ($action == 'new') {
			
			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND id_statusregistro != 3";
			$array_return  = true;
			$row = sqlQueries($conn, $sql, $array_return);
			
			

			if(count($row) == 0){

				$senha = password_hash(base64_encode($_GET['senha']), PASSWORD_BCRYPT);

				$sql = "INSERT INTO usuarios (nome_completo, login, senha, id_statusregistro) values ('$nomecompleto', '$login', '$senha', '$statusregistro');";
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

			$sql = "UPDATE usuarios SET nome_completo = '$nomecompleto', login = '$login', $senha id_statusregistro = '$statusregistro' WHERE id = $action";
			$array_return = false;
			$row = sqlQueries($conn, $sql, $array_return);
			$text = "AND id != $action";
			
			$messageToast = $row;
			$message = "Usuário atualizado";
			$status = 1;
		}
	}

	header("location: ../../../../view/administrativo/iframes/usuario/controlador.php?messageToast=$messageToast&statusToast=$statusToast&trigger=$continuarcadastrando");
	/* header("location: ../../../../../../view/administrativo/iframes/usuario/controlador.php?messageToast=$messageToast&statusToast=$statusToast&trigger=$continuarcadastrando"); */
?>