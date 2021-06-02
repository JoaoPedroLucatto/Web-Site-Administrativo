<?php
$messageToast = "Ocorreu um erro interno no sistema, contate o suporte para análise";
$statusToast = 9;

if($_POST['titulo'] && $_POST['row_id']){

    include '../../../../model/connect.php';

    $action = $_POST['action'];
    $row_id = $_POST['row_id'];

    $images = $_FILES['upload-imagem'];

    $raiz = '../../../../';
    $pasta = 'uploads/projetos/';

    $qtdeFotos = $_POST['qtdeSelecFotos'];

    $extensoes_permitidas = array('jpg', 'jpeg', 'png');

    $titulo = strtoupper(removeAccent($_POST['titulo']));
    $status = $_POST['statusregistro'] ? $_POST['statusregistro'] : 1;
    $descricao = removeAccent($_POST['descricao']);

    /* NOVO PROJETO */
    if($action == 'new'){

        $sql = "INSERT INTO projetos (titulo, descricao, datahorainclusao, id_statusregistro, qtdefotos) VALUES ('$titulo', '$descricao', now(), $status, $qtdeFotos);";
        $query = sqlQueries($conn, $sql, false);

        if($query){

            $ultimo_id = mysqli_insert_id($conn);
            $diretorio = "$raiz$pasta$ultimo_id".'/';

            foreach ($_POST['row_id'] as $id) {

                $permiteSelecionar = isset($_POST['permiteSelecionar'][$id]) ? '1' : '0';
                $permiteDownload = isset($_POST['permiteDownload'][$id]) ? '1' : '0';

                $sql = "INSERT INTO projetos_clientes (id_projeto, id_cliente, permite_selecionar, permite_download) VALUES ($ultimo_id, $id, '$permiteSelecionar', '$permiteDownload');";
                $query = sqlQueries($conn, $sql, false);

            }
            
            if(mkdir($diretorio, 0755)){

                if($images['size'][0] > 0){
                    if(uploadIMG($images, $extensoes_permitidas ,$diretorio)){                    
                        $messageToast = "Projeto Cadastrado";
                        $statusToast = 1;
    
                    }
                    else{
    
                        $messageToast = "Problema ao Carregar " . (count($images['name']) == 1 ? 'a imagem, verifique a extensão da imagem' : 'as Imagens , verifique as extensões das imagens.');
                        $statusToast = 3;
    
                    }
                }
                else{

                    $messageToast = "Projeto Cadastrado";
                    $statusToast = 1;

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

    /* EDITAR UM PROJETO */
    else{

        $sql = "UPDATE projetos SET titulo = '$titulo', descricao = '$descricao', id_statusregistro = $status, qtdefotos = $qtdeFotos WHERE id = $action";
        $query_projeto = sqlQueries($conn, $sql, false);

        $sql = "DELETE FROM projetos_clientes WHERE id_projeto = '$action'";
        $query_delete = sqlQueries($conn, $sql, false);

        if($query_delete && $query_projeto){

            foreach($row_id as $id){
                
                $permiteSelecionar = isset($_POST['permiteSelecionar'][$id]) ? '1' : '0';
                $permiteDownload = isset($_POST['permiteDownload'][$id]) ? '1' : '0';
        
                $sql = "INSERT INTO projetos_clientes (id_projeto, id_cliente, permite_selecionar, permite_download) VALUES ($action, $id, '$permiteSelecionar', '$permiteDownload');";
                $query = sqlQueries($conn, $sql, false);
                if($query){
                    print_r('Insert com sucesso');
                }
    
            }

            /* VERIFICA SE TEM ALGUMA IMAGEM NOVA PARA SER ADCIONADA */
            if($images['size'][0] > 0){

                $diretorio = "$raiz$pasta$action".'/';
                
                if(uploadIMG($images, $extensoes_permitidas ,$diretorio)){
    
                    $messageToast = "Projeto Atualizado";
                    $statusToast = 1;
        
                }
                else{
    
                    $messageToast = "Problema ao Substituir ".(count($images['name']) == 1 ? 'a Imagem, contate o suporte para análise.' : 'as Imagens , contate o suporte para análise.');
                    $statusToast = 3;
    
                }
            }
            else{
    
                $messageToast = "Projeto Atualizado";
                $statusToast = 1;
                
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
