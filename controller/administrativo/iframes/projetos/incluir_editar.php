<?php
$messageToast = "Ocorreu um erro interno no sistema, contate o suporte para análise";
$statusToast = 9;

if($_POST['titulo'] && $_POST['row_id']){

    include '../../../../model/connect.php';

    $action = $_POST['action'];

    $images = $_FILES['upload-imagem'];


    $raiz = '../../../../';
    $pasta = 'uploads/projetos/';
    
    $extensoes_permitidas = array('.jpg', '.jpeg', '.png');

    print_r($extensao);

    $titulo = strtoupper(removeAccent($_POST['titulo']));
    $status = $_POST['statusregistro'] ? $_POST['statusregistro'] : 1;
    $descricao = removeAccent($_POST['descricao']);

    if($action == 'new'){

        $sql = "INSERT INTO projetos (titulo, descricao, datahorainclusao, id_statusregistro) VALUES ('$titulo', '$descricao', now(), $status);";
        $query = sqlQueries($conn, $sql, false);

        if($query){

            $ultimo_id = mysqli_insert_id($conn);
            $diretorio = "$raiz$pasta$ultimo_id".'/';

            foreach ($_POST['row_id'] as $id) {
                $sql = "INSERT INTO projetos_clientes (id_projeto, id_cliente) VALUES ($ultimo_id, $id);";
                $query = sqlQueries($conn, $sql, false);
            }
            
            if(mkdir($diretorio, 0755)){

                if(uploadIMG($images, $extensoes_permitidas ,$diretorio) && compactaZIP($diretorio)){                    

                    $messageToast = "Projeto Cadastrado";
                    $statusToast = 1;

                }
                else{

                    $messageToast = "Problema ao Carregar " . (count($images['name']) == 1 ? 'a imagem, verifique a extensão da imagem' : 'as Imagens , verifique as extensões das imagens.');
                    $statusToast = 3;

                }
            }
            else{

                $messageToast = "Ao criar o Diretório";
                $statusToast = 2;
            }
        }
        else{

            $messageToast = "Projeto Não Cadastrado";
            $statusToast = 2;

        }
    }

    /* EDITAR UM PROJETO EXISTENTE */
    else{

        $sql = "UPDATE projetos SET titulo = '$titulo', descricao = '$descricao', id_statusregistro = $status WHERE id = $action";
        $query_projeto = sqlQueries($conn, $sql, false);
        
        foreach ($row_id as $id) {

            $sql = "UPDATE projetos_clientes SET id_projeto = '$action', id_cliente = $id";
            $query_cliente = sqlQueries($conn, $sql, false);
        }

        if($images != ''){

            $diretorio = "$raiz$pasta$action".'/';
            
            if(uploadIMG($images, $extensoes_permitidas ,$diretorio) && compactaZIP($diretorio)){

                $messageToast = "Projeto Atualizado";
                $statusToast = 1;
    
            }
            else{

                $messageToast = "Problema ao Substituir ".count($images['name']) == 1 ? 'a Imagem, contate o suporte para análise.' : 'as Imagens , contate o suporte para análise.';
                $statusToast = 3;

            }
        }
        else{

            $messageToast = "Projeto não foi Atualizado";
            $statusToast = 2;
            
        }
    }
}
else{

    $messageToast = "Verifique os Campos Necessários";
    $statusToast = 3;

}

header("location:../../../../view/administrativo/iframes/projetos/controlador.php?messageToast=$messageToast&statusToast=$statusToast");

?>
