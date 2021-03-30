

<?php

	$retorno['code'] = 9;
	$retorno['message'] = "Ocorreu um erro ao tentar abrir o projeto selecionado";

	
	include_once '../../../model/connect.php';




	if (isset($_POST['projeto_id'])) {
		$projeto_id = $_POST['projeto_id'];

		$select = "SELECT 
					proj.titulo, proj.descricao
					FROM projetos proj
					WHERE proj.id = {$projeto_id}";
		$projeto_object = sqlQueries($conn, $select, true)[0];

		if (!empty($projeto_object)) {
			
			$retorno['code'] = 1;


			$arquivos_array = [];
			$arquivo_compactado = null;

			$arquivos_diretorio = array_diff( scandir("../../../uploads/projetos/{$projeto_id}/"), array('.','..') ); 
	        
	        foreach ($arquivos_diretorio as $arquivo) {
	        	$pathinfo = pathinfo($arquivo);
	        	$pathinfo_extension = strtolower( $pathinfo['extension'] );

	        	if ($pathinfo_extension == 'zip' || $pathinfo_extension == 'rar') {
	        		$arquivo_compactado = array(
	        			"arquivo_completo" => $arquivo,
	        			"nome" => $pathinfo['filename'],
	        			"extensao" => $pathinfo_extension
	        		);
	        	}

	        	else {
	        		$arquivos_array[] = $arquivo;
	        	}
	        }



	        $retorno['message'] = array(
	        	"titulo" => ucwords( strtolower( $projeto_object['titulo'] ) ),
	        	"descricao" => $projeto_object['descricao'],
	        	"diretorio" => "uploads/projetos/{$projeto_id}/",
	        	"arquivo_compactado" => $arquivo_compactado,
	        	"arquivos" => $arquivos_array
	        );
		}
	}



	echo json_encode($retorno);

?>