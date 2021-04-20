<?php

    $messageToast = "Ocorreu um erro interno no sistema, contate o suporte para análise";
    $statusToast = 9;

    include_once '../../../../model/connect.php';

    $nome_empresa = removeAccent($_POST['nome_empresa']);
    $imagem = $_FILES['upload-imagem'];

    $nome_sobre = strtoupper(removeAccent($_POST['nome_sobre']));
    $link_sobre = $_POST['link_sobre'];
    $descri_sobre = $_POST['descri_sobre'];

    $email_contato = $_POST['email_contato'];
    $logradouro_contato = strtoupper(removeAccent($_POST['logradouro_contato']));
    $numero_contato = $_POST['numero_contato'];
    $bairro_contato = strtoupper(removeAccent($_POST['bairro_contato']));
    $cidade_contato = strtoupper(removeAccent($_POST['cidade_contato']));
    $telefone_contato = $_POST['telefone_contato'];

    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $whatsapp = $_POST['whatsapp'];
    $linkdin = $_POST['linkdin'];

    $diretorio = '../../../../images/'; 
    $logo = "$diretorio".'logo.png';
    $extensao = pathinfo($imagem['name'][0], PATHINFO_EXTENSION);
    $extensao_permitidas = array('png');

    printf($imagem['size'][0]);


    $sql = "UPDATE configuracoes SET nome_empresa = '$nome_empresa', nome_sobre = '$nome_sobre', texto_sobre = '$descri_sobre' , link_video_sobre = '$link_sobre', email = '$email_contato', end_logradouro = '$logradouro_contato', end_numero = '$numero_contato', end_bairro = '$bairro_contato', end_cidade = '$cidade_contato', telefone = '$telefone_contato', facebook = '$facebook' , instagram = '$instagram', linkedin = '$linkdin', whatsapp = '$whatsapp' WHERE id = 1";
    $query = sqlQueries($conn, $sql, false);

    if($query){
        
        if($imagem['size'][0] > 0){

            if(unlink($logo) &&  in_array($extensao, $extensao_permitidas) === true){

                if(move_uploaded_file($imagem['tmp_name'][0], $diretorio.'logo.png')){

                    $messageToast = "Configurações Alteradas";
                    $statusToast = 1;
                }
                else{

                    $messageToast = "Confirações não foram alteradas";
                    $statusToast = 2;

                }

            }
            else{

                $messageToast = "Verifique a extensão da imagem";
                $statusToast = 3;

            }

        }
        else{

            $messageToast = "Configurações Alteradas";
            $statusToast = 1;
            
        }
        
    }
    else{

        $messageToast = "Configurações não salvas";
        $statusToast = 2;

    }

    
    /* header("location:../../../../view/administrativo/iframes/configuracoes/controlador.php?messageToast=$messageToast&statusToast=$statusToast"); */

?>