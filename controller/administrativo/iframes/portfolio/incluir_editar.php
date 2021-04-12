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


        $raiz = '../../../../';
        $pasta = 'uploads/website/';
        $extensoes_permitidas = array('.jpg', '.jpeg', '.png');

        /*  NOVO CADASTRO SLIDER/PORTFÓLIO */
        if($action == 'new'){

            /* SLIDER */
            if($_POST['tipo_registro'] == 1){

                if($_POST['statusregistro'] && $_POST['cor_texto'] && $_POST['posicao_texto'] && $imagem['size'][0] > 0){

                    $sql = "INSERT INTO portfolio (titulo, cor_texto, posicao_texto, tipo_registro ,id_statusregistro) VALUES ('$titulo', $cor_texto, $posicao_texto, $tipo_registro ,$staturegistro)";
                    $query = sqlQueries($conn, $sql, false);

                    if($query){

                        $ultimo_id = mysqli_insert_id($conn);
                        $diretorio = "$raiz$pasta$ultimo_id".'/';

                        if(mkdir($diretorio, 0755)){

                            if(uploadIMG($imagem, $extensoes_permitidas, $diretorio)){

                                $messageToast = "Slider Cadastrado";
                                $statusToast = 1;

                            }
                            else{

                                $messageToast = "Upload da Imagem";
                                $statusToast = 2;

                            }
                        }
                        else{

                            $messageToast = "Diretório não criado, contate o suporte para análise";
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
    
                        $ultimo_id = mysqli_insert_id($conn);
                        $diretorio = "$raiz$pasta$ultimo_id".'/';
    
                        if(mkdir($diretorio, 0755)){

                            if($imagem['size'][0] > 0){

                                if(uploadIMG($imagem, $extensoes_permitidas, $diretorio)){
    
                                    $messageToast = "Portfólio Cadastrado";
                                    $statusToast = 1;
        
                                }
                                else{
        
                                    $messageToast = "Upload da Imagem";
                                    $statusToast = 2;
        
                                }
                            }
                            else{

                                $messageToast = "Portfólio Cadastrado";
                                $statusToast = 1;
                            }
                        }
                        else{
    
                            $messageToast = "Diretório não criado, contate o suporte para análise";
                            $statusToast = 3;
    
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

                $sql = "UPDATE portfolio SET titulo = '$titulo', cor_texto = $cor_texto, posicao_texto = $posicao_texto, tipo_registro = $tipo_registro, id_statusregistro = $staturegistro WHERE id = $action";
                $query = sqlQueries($conn, $sql, false);

                if($query){

                    $diretorio = "$raiz$pasta$action".'/';

                    if($imagem['size'][0] > 0){
                        
                        if(delIMG($diretorio)){

                            if(uploadIMG($imagem, $extensoes_permitidas, $diretorio)){
    
                                $messageToast = "Slider Alterado";
                                $statusToast = 1;
    
                            }
                            else{
    
                                $messageToast = "Upload da Imagem";
                                $statusToast = 2;
    
                            }
                        }
                        else{

                            $messageToast = "Problema ao substituir a imagem existente, contate o suporte para análise";
                            $statusToast = 9;

                        }
                    }
                    else{

                        if(delIMG($diretorio)){

                            $messageToast = "Slider Alterado";
                            $statusToast = 1;

                        }
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

                    if($imagem['size'][0] > 0){

                        $diretorio = "$raiz$pasta$action".'/';

                        if(delIMG($diretorio)){

                            if(uploadIMG($imagem, $extensoes_permitidas, $diretorio)){
    
                                $messageToast = "Portfólio Alterado";
                                $statusToast = 1;
    
                            }
                            else{
    
                                $messageToast = "Upload da Imagem";
                                $statusToast = 2;
    
                            }
                        }
                        else{

                            $messageToast = "Problema ao substituir a imagem existente, contate o suporte para análise";
                            $statusToast = 9;

                        }
                    }
                    else{

                        $messageToast = "Portfólio Alterado";
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
