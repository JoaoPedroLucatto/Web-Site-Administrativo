

<?php

	$maximo_imagens = 4;

	$retorno['code'] = 9;
	$retorno['message'] = "Ocorreu um erro ao tentar abrir o projeto selecionado";

	
	include_once '../../../model/connect.php';



	if (isset($_POST['projeto_id']) && isset($_POST['action'])) {
		$projeto_id = $_POST['projeto_id'];
		$contador_imagens = isset($_POST['contador_imagens']) ? $_POST['contador_imagens'] : 0;
		
		if ($_POST['action'] == 'get_project') {
			$select = "SELECT 
						proj.id, proj.titulo, proj.descricao, proj.qtdefotos_selecionar as quantidade_fotos_selecionar, proj.fotos_selecionadas
						FROM projetos proj
						WHERE proj.id = {$projeto_id}";
			$projeto_object = sqlQueries($conn, $select, true)[0];

			if (!empty($projeto_object)) {
				$retorno['code'] = 1;

				$buscarImagens = buscarImagens($projeto_id, $maximo_imagens, $contador_imagens);

				$arquivos_array = $buscarImagens['arquivos_array'];
				$arquivo_compactado = $buscarImagens['arquivo_compactado'];
				$mostrar_mais = $buscarImagens['mostrar_mais'];


		        $retorno['message'] = array(
		        	"id" => $projeto_object['id'],
		        	"titulo" => ucwords( strtolower( $projeto_object['titulo'] ) ),
		        	"descricao" => $projeto_object['descricao'],
		        	"quantidade_fotos_selecionar" => !empty($projeto_object['quantidade_fotos_selecionar']) ? $projeto_object['quantidade_fotos_selecionar'] : 999999,
		        	"diretorio" => "uploads/projetos/{$projeto_id}/",
		        	"arquivo_compactado" => $arquivo_compactado,
		        	"arquivos" => $arquivos_array,
		        	"mostrar_mais" => $mostrar_mais,
		        	"fotos_selecionadas" => $projeto_object['fotos_selecionadas'],
		        	"quantidade_fotos_selecionadas" => !empty($projeto_object['fotos_selecionadas']) ? count(explode('</></>', $projeto_object['fotos_selecionadas'])) : 0
		        );
			}
		}

		else {
			$retorno['code'] = 1;
			$buscarImagens = buscarImagens($projeto_id, $maximo_imagens, $contador_imagens);

			$arquivos_array = $buscarImagens['arquivos_array'];
			$mostrar_mais = $buscarImagens['mostrar_mais'];


		    $retorno['message'] = array(
		       	"arquivos" => $arquivos_array,
		       	"mostrar_mais" => $mostrar_mais
			);
		}
	}




	function buscarImagens($projeto_id, $maximo_imagens, $contador) {
		$arquivos_array = [];
		$arquivo_compactado = null;
		$mostrar_mais = false;

		$arquivos_diretorio = array_diff( scandir("../../../uploads/projetos/{$projeto_id}/"), array('.','..') );

		$contador_minimo = $contador;
		$contador_maximo = $contador + $maximo_imagens;
		$contador_atual = 0;
		        
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
				if ($contador_atual < $contador_minimo) {
					$contador_atual ++;
					continue;
				} else if ($contador_atual >= $contador_maximo) {
					$mostrar_mais = true;
				}
				

				if (!$mostrar_mais) {
					$arquivos_array[] = array(
						"arquivo" => $arquivo
					);
			    	$contador_atual ++;
				}
		    }
		}


		return array(
			"arquivos_array" => $arquivos_array,
			"arquivo_compactado" => $arquivo_compactado,
			"mostrar_mais" => $mostrar_mais
		);
	}



	echo json_encode($retorno);

?>