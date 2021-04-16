<?php
    date_default_timezone_set('America/Sao_Paulo');

    session_start();
    

    //OCULTAR ERROS
    error_reporting(0);
    ini_set("display_errors", 0);
    ini_set("display_startup_erros", 0);



    // $host = "localhost";
    // $dbname = "projeto_fotografia";
    // $username = "root";
    // $password = "root";
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


    /* COMPACTA OS ARQUIVOS DO DIRETÓRIO */
    function compactaZIP($dir){

        $file_name = 'fotos.zip';
        $scan_dir = scandir($dir);
        array_shift($scan_dir);
        array_shift($scan_dir);

        $zip = new ZipArchive();

        if($zip->open($dir.$file_name, (ZipArchive::CREATE | ZipArchive::OVERWRITE))){

            foreach($scan_dir as $imagem){

                $zip->addFile($dir.$imagem, $imagem);
                $return = true;

            }

            $zip->close();

        }

        return $return ? $return : false;
        
    } 
    
    
    /* EXTRAIR ARQUVOS*/
    function extractZIP($origem, $destino){
        
        $ZIP_file = new ZipArchive;
        $ZIP_open = $ZIP_file->open($origem);

        if($ZIP_open === true){

            $ZIP_file->extractTo($destino);
            $ZIP_file->close();
        
            return true;
        }
        else{
            return false;
        }
    }


    /* DELETAR DIRETÓRIO */
    function delTree($dir) { 
        $files = array_diff(scandir($dir), array('.','..')); 
        foreach ($files as $file) { 
          (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        } 
         return rmdir($dir);
    }

    /* DELETE IMAMGEM DA PASTA */
    function delIMG($diretorio, $name_img){

        if(unlink("$diretorio$name_img")){

            return true;

        }
        else{

            return true;
        }
    }


      /* VERIFICA EXTENSÃO E ADICIONA A IMAGEM  */
    function uploadIMG($images, $extensoes_permitidas, $dir){

        for($i = 0; $i < count($images['type']); $i++){

            $extensao = pathinfo($images['name'][$i], PATHINFO_EXTENSION);

            if(in_array($extensao, $extensoes_permitidas) === true){

                $name_img = $images['name'][$i];
                $tmp_img = $images['tmp_name'][$i];

                if(unlink("$dir$name_img")){

                    move_uploaded_file($tmp_img, $dir.$name_img);
                    $return = true;

                }
                else{

                    move_uploaded_file($tmp_img, $dir.$name_img);
                    $return = true;

                }
            }
        }

        return $return;
    }
?>