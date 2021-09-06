

<?php
    $logotipo = 'images/' . ( file_exists("images/logo.png") ? 'logo.png' : 'logo_default.png' );
?>



<!-- CSS -->
<link rel="stylesheet" href="style/css/administrativo/menu-lateral.css">


<!-- JAVASCRIPT -->
<script type="text/javascript" src="style/js/administrativo/custom.js"></script>


<div class="btn-menu">
        <a class="btn-floating pulse"><img src="images/icons/sort-white.png" alt=""></a>
    </div>
    <div class="menu">
        <div class="logo-menu">
            <img class="responsive-img" <?php echo file_exists("images/logo.png") ? 'src="images/logo.png"' : 'src="images/logo_default.png"'?>>
        </div>

        <div class="menu-principal" id="selected">
            <ul>
                <li data-link="view/administrativo/iframes/dashboard/controlador.php" class="menu-is-selected"><a href="#"><img src="images/icons/dashboard_white.png">Painel</a></li>
                <li data-link="view/administrativo/iframes/cliente/controlador.php"><a href="#"><img src="images/icons/person_add_white.png">Clientes</a></li>
                <li data-link="view/administrativo/iframes/usuario/controlador.php"><a href="#"><img src="images/icons/admin_panel_white.png">Usuários</li>
                <li data-link="view/administrativo/iframes/projetos/controlador.php"><a href="#"><img src="images/icons/folder-white.png">Projetos</li>
                <li data-link="view/administrativo/iframes/portfolio/controlador.php"><a href="#"><img src="images/icons/card_travel_white.png">Porfólio</a></li>
                <li data-link="view/administrativo/iframes/contato/controlador.php"><a href="#"><img src="images/icons/money_white.png">Contato</a></li>
                <li data-link="view/administrativo/iframes/configuracoes/controlador.php"><a href="#"><img src="images/icons/build_white.png">Configurações</a></li>
            </ul>
        </div>
    </div>