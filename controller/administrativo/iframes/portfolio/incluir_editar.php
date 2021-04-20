<?php

    $messageToast = "Ocorreu um erro interno no sistema, contate o suporte para análise";
    $statusToast = 9;

    if($_POST['titulo']){

        include_once '../../../../model/connect.php';

        $action = $_POST['action'];        

                            
        $tipo_registro = $_POST['tipo_registro'];
        $titulo = $_POST['titulo'];
        $staturegistro = $_POST['statusregistro'];
        $subtitulo_1 = $_POST['subtitulo_1'];
        $subtitulo_2 = $_POST['subtitulo_2'];
        $link = $_POST['link_video'];
        $imagem = $_FILES['upload-imagem'];
        $cor_texto = $_POST['cor_texto'];
        $posicao_texto = $_POST['posicao_texto'];


        $diretorio ='../../../../uploads/website/';
        $extensoes_permitidas = array('jpeg');
        $extensao = pathinfo($imagem['name'][0], PATHINFO_EXTENSION);

        /*  NOVO CADASTRO SLIDER/PORTFÓLIO */
        if($action == 'new'){

            /* SLIDER */
            if($_POST['tipo_registro'] == 1){

                if($_POST['statusregistro'] && $_POST['cor_texto'] && $_POST['posicao_texto'] && $imagem['size'][0] > 0){

                    $sql = "INSERT INTO portfolio (titulo, subtitulo_1, cor_texto, posicao_texto, tipo_registro ,id_statusregistro) VALUES ('$titulo', '$subtitulo_1', $cor_texto, $posicao_texto, $tipo_registro ,$staturegistro)";
                    $query = sqlQueries($conn, $sql, false);

                    if($query){

                        $ultimo_id = mysqli_insert_id($conn);
                        $name_img = "slider_$ultimo_id.";

                        if(in_array($extensao, $extensoes_permitidas) === true  && move_uploaded_file($imagem['tmp_name'][0], $diretorio.$name_img.$extensao)){

                            $messageToast = "Slider Cadastrado";
                            $statusToast = 1;

                        }
                        else{
                            
                            $messageToast = "Problema ao realizar o Upload da Imagem";
                            $statusToast = 3;

                        }
                    }
                    else{

                        $messageToast = "Slider não Cadastrado";
                        $statusToast = 2;

                    }   
                }
                else{

                    $messageToast = "Preencha os campos Obrigatórios";
                    $statusToast = 3;

                }
            }
            /* PORTFÓLIO */
            else{

                if($imagem['size'][0] > 0 || $link != 'null'){

                    $sql = "INSERT INTO portfolio (titulo, subtitulo_1, subtitulo_2, tipo_registro, id_statusregistro, link_video) VALUES ('$titulo', '$subtitulo_1', '$subtitulo_2', $tipo_registro, $staturegistro, '$link')";
                    $query = sqlQueries($conn, $sql, false);
    
                    if($query){

                        if($imagem['size'][0] > 0){

                            $ultimo_id = mysqli_insert_id($conn);
                            $name_img = "portfolio_$ultimo_id.";

                            if(in_array($extensao, $extensoes_permitidas) === true  && move_uploaded_file($imagem['tmp_name'][0], $diretorio.$name_img.$extensao)){

                                $messageToast = "Portfólio Cadastrado";
                                $statusToast = 1;

                            }
                            else{
                            
                                $messageToast = "Problema ao realizar o Upload da Imagem";
                                $statusToast = 3;

                            }
                        }
                        else{

                            $messageToast = "Portfólio Alterado";
                            $statusToast = 1;

                        }

                        
                    }
                    else{
    
                        $messageToast = "Portfólio não Cadastrado";
                        $statusToast = 2;
    
                    }
                }
                else{

                    $messageToast = "Informe um Link ou Imagem";
                    $statusToast = 3;
                }
            }
        }
        /* ALTERAÇÃO SLIDER/PORTFOLIO */
        else{

            if($tipo_registro == 1){

                $sql = "UPDATE portfolio SET titulo = '$titulo', subtitulo_1 = '$subtitulo_1' ,cor_texto = $cor_texto, posicao_texto = $posicao_texto, tipo_registro = $tipo_registro, id_statusregistro = $staturegistro WHERE id = $action";
                $query = sqlQueries($conn, $sql, false);

                if($query){

                    if($imagem['size'][0] > 0){

                        $name_img = "slider_$action.$extensao";
                        delIMG($diretorio, $name_img);

                            if(in_array($extensao, $extensoes_permitidas) === true && move_uploaded_file($imagem['tmp_name'][0], $diretorio.$name_img)){
    
                                $messageToast = "Slider Alterado";
                                $statusToast = 1;
    
                            }
                            else{
    
                                $messageToast = "Problema ao substituir a imagem existente, contate o suporte para análise";
                                $statusToast = 3;
    
                            }
                    }
                    else{

                        $messageToast = "Slider Alterado";
                        $statusToast = 1;
                    }

                }
                else{

                    $messageToast = "Atualizar Slider";
                    $statusToast = 2;
                }

            }
            /* ALTERAÇÃO DO PORTFÓLIO */
            else{

                $sql = "UPDATE portfolio SET titulo = '$titulo', subtitulo_1 = '$subtitulo_1', subtitulo_2 = '$subtitulo_2', tipo_registro = $tipo_registro, id_statusregistro = $staturegistro, link_video = '$link' WHERE id = $action";
                $query = sqlQueries($conn, $sql, false);

                if($query){

                    $name_img = "portfolio_$action.jpeg";

                    if($imagem['size'][0] > 0){

                        delIMG($diretorio, $name_img);

                            if(in_array($extensao, $extensoes_permitidas) === true && move_uploaded_file($imagem['tmp_name'][0], $diretorio.$name_img)){
    
                                $messageToast = "Portfólio Alterado";
                                $statusToast = 1;
    
                            }
                            else{
    
                                $messageToast = "Problema ao substituir a imagem";
                                $statusToast = 3;
    
                            }
                    }
                    else{

                        delIMG($diretorio, $name_img);
                        $messageToast = "Portfólio ssss";
                        $statusToast = 1;

                    }

                }
                else{

                    $messageToast = "Atualizar Portfólio";
                    $statusToast = 2;
                }

            }

        }
    }
    else{

        $messageToast = "Preencha os campos Obrigatórios";
        $statusToast = 3;

    }

header("location:../../../../view/administrativo/iframes/portfolio/controlador.php?messageToast=$messageToast&statusToast=$statusToast");

?>
