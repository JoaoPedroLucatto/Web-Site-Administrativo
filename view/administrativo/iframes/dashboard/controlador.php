<!-- CSS -->
<link rel="stylesheet" href="../../../../style/css/administrativo/objects/sub-header.css">
<link rel="stylesheet" href="../../../../style/css/administrativo/objects/dashboard/card.css">
<link rel="stylesheet" href="../../../../style/css/materialize-framework.css">
<link rel="stylesheet" href="../../../../style/css/administrativo/iframes/iframe.css">

<script type="text/javascript" src="../../../../style/js/jquery.js"></script>
<script type="text/javascript" src="../../../../style/js/administrativo/iframes/content.js"></script>

<div class="row">
    <div class="s12">
        <div class="sub-header">
            <a class="title-sub-header"><img src="../../../../images/icons/dashboard_black.png">Painel</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 iframe-content">
    
        <?php

            include_once '../../../../model/connect.php';

            include_once 'objects/cliente.php';
            include_once 'objects/usuario.php';
            include_once 'objects/projetos.php';
            include_once 'objects/contato.php';
            include_once 'objects/feedback.php';

        ?>    
        
    </div>
</div>