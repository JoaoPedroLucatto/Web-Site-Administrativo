<?php

    include_once '../../../../model/connect.php';

    $checked = $_GET['checkbox-visto'] ? '1' : '0';
    $action = $_GET['action'];

    $sql = "UPDATE website_contato SET visto = $checked WHERE id = $action";
    $query = sqlQueries($conn, $sql, false);

    if($query){

        $messageToast = "Informações Salvas";
        $statusToast = 1;

    }
    else{

        $messageToast = "Informações não salvas";
        $statusToast = 2;

    }

    
    header("location:../../../../view/administrativo/iframes/contato/controlador.php?messageToast=$messageToast&statusToast=$statusToast");

?>