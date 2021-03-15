<?php
    date_default_timezone_set('America/Sao_Paulo');

    session_start();
    

    //OCULTAR ERROS
    error_reporting(0);
    ini_set("display_errors", 0);
    ini_set("display_startup_erros", 0);



    /* $host = "localhost";
    $dbname = "projeto_fotografia";
    $username = "root";
    $password = "root"; */
    $host = "localhost";
    $dbname = "foto";
    $username = "will";
    $password = "willroot";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(!$conn){
        die("Não foi possível conectar-se ao banco de dados, contate do administrador do sistema para análise");
    }


    function sqlQueries($connect, $sql, $array_return){
        $query = mysqli_query($connect, $sql);
        
        if($array_return){
            $array_return = [];

            while($row = mysqli_fetch_assoc($query)){
                $array_return[] = $row;
            }
            
            return $array_return;
        }
        else{
            return $query ? true : false;
        }
    }


    //FUNÇÃO PARA REMOVER ACENTOS DAS STRINGS
	function removeAccent($text) {
		return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $text);
	}


	//FUNÇÃO PARA REMOVER TODOS OS ESPAÇOS
	function removeSpace($text) {
		return preg_replace("/ /", null, $text);
	}


	//FUNÇÃO PARA REMOVER SQL INJECTION
	function removeSQLInjection($text) {
		return preg_replace("/--/", null, $text);
	}

?>