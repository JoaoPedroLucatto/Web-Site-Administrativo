

<?php
	$retorno['code'] = 9;
	$retorno['message'] = 'Ocorreu um erro interno no sistema, contate o suporte para análise';


	include_once '../../model/connect.php';


	if ($_POST['nome'] && $_POST['nome_conjuge'] && $_POST['email'] && $_POST['celular'] && $_POST['evento'] && $_POST['data'] && $_POST['informacoes']) {
		$nome = strtoupper(removeAccent($_POST['nome']));
		$nome_conjuge = strtoupper(removeAccent($_POST['nome_conjuge']));
		$email = $_POST['email'];
		$celular = $_POST['celular'];
		$evento = strtoupper(removeAccent($_POST['evento']));
		$data = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));
		$informacoes = strtoupper(removeAccent($_POST['informacoes']));


		$insert = "INSERT INTO website_contato
					(nome, nome_conjuge, email, celular, evento, data, observacoes) VALUES 
					('$nome', '$nome_conjuge', '$email', '$celular', '$evento', '$data', '$informacoes')";
		$query = sqlQueries($conn, $insert, false);


		if ($query) {
			$retorno['code'] = 1;
			$retorno['message'] = 'Informações salvas';
		}
	}


	echo json_encode($retorno);
?>