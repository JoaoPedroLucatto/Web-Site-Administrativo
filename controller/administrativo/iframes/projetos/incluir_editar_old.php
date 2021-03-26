<?php
$messageToast = "Ocorreu um erro interno no sistema, contate o suporte para análise";
$statusToast = 9;

/* VERIFICA OS CAMPOS PREENCHIDOS */
if ($_POST['titulo'] && $_POST['row_id']) {

    include '../../../../model/connect.php';

    $extensoes_permitidas = array('.zip');
    $extensao_arquivo = strrchr($_FILES['upload-arquivo']['name'], '.');

    $action = $_POST['action'];

    $raiz = '../../../../';
    $pasta = 'uploads/projetos/';
    $nomearquivo = $_FILES['upload-arquivo']['name'];

    $titulo = strtoupper(removeAccent($_POST['titulo']));
    $descricao = removeAccent($_POST['descricao']);
    $status = $_POST['statusregistro'];


    if ($action == 'new') {

        if (in_array($extensao_arquivo, $extensoes_permitidas) === true) {

            $sql = "INSERT INTO projetos (titulo, descricao, datahorainclusao, id_statusregistro, nome_arquivo) VALUES ('$titulo', '$descricao', now(), $status, '$nomearquivo');";
            $query = sqlQueries($conn, $sql, false);

            if ($query) {
                $ultimo_id = mysqli_insert_id($conn);
                foreach ($_POST['row_id'] as $id) {
                    $sql = "INSERT INTO projetos_clientes (id_projeto, id_cliente) VALUES ($ultimo_id, $id);";
                    $query = sqlQueries($conn, $sql, false);
                }

                $diretorio = "$raiz$pasta" . $ultimo_id . '/';

                if (mkdir($diretorio, 0755) && move_uploaded_file($_FILES['upload-arquivo']['tmp_name'], $diretorio . $nomearquivo)) {

                    $origem = $diretorio . $nomearquivo;

                    if (extractZIP($origem, $diretorio)) {

                        $messageToast = "Projeto Cadastrado";
                        $statusToast = 1;
                    } 
                    else {
                        $messageToast = "Erro ao Extrair o Arquivo";
                        $statusToast = 2;
                    }
                } 
                else {
                    $messageToast = "Impossivel de Realizar o Upload do Arquivo";
                    $statusToast = 2;
                }
            } 
            else {
                $messageToast = "Erro ao Cadastrar o Projeto";
                $statusToast = 2;
            }
        } 
        else {

            $messageToast = "Formato do Arquivo Permitido: .zip";
            $statusToast = 3;
        }
    } 

    /*EDITAR PROJETO*/
    else {

        $text = '';
        $sql = "UPDATE projetos SET titulo = '$titulo', descricao = '$descricao', id_statusregistro = $status $text WHERE id = $action";

   /*      if($nomearquivo != ''){
            
            $text = ", nome_arquivo = '$nomearquivo'";

        } */

        $query_projeto = sqlQueries($conn, $sql, false);

        $sql = "SELECT nome_arquivo projetos WHERE id = $action";
        $query_nomeArquivo = sqlQueries($conn, $sql, true)[0];

        foreach ($row_id as $id) {

            $sql = "UPDATE projetos_clientes SET id_projeto = '$action', id_cliente = $id";
            $query_cliente = sqlQueries($conn, $sql, false);
        }

        if ($nomearquivo != $query_nomeArquivo['nome_arquivo']) {

            $diretorio = "$raiz$pasta$action";

            if(delTree($diretorio) != null){
                if(mkdir($diretorio, 0755) && move_uploaded_file($_FILES['upload-arquivo']['tmp_name'], $diretorio."/".$nomearquivo)){
                    
                    $origem = $diretorio.'/'.$nomearquivo;

                    if(extractZIP($origem, $diretorio)){

                        $messageToast = "Projeto Atualizado";
                        $statusToast = 1;

                    }
                    else{
                        $messageToast = "Não extraiu";
                    }
                }
                else{
                    $messageToast = "não criou a pasta";
                }
            }
            else{
                $messageToast = "não deletou a pasta ";
            }
        }
        else{

            $messageToast = "Projeto Atualizado";
            $statusToast = 1;

        }
    }
} 
else {
    $messageToast = "Verifique os Campos Necessários";
    $statusToast = 3;
}

header("location:../../../../view/administrativo/iframes/projetos/controlador.php?messageToast=$messageToast&statusToast=$statusToast");
