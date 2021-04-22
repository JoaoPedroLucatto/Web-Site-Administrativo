
<?php
    include_once 'model/connect.php';


    $select = "SELECT * FROM configuracoes LIMIT 1";
    $config_array = sqlQueries($conn, $select, true)[0];
?>



<!DOCTYPE html>
<html>
<head>
    <title> <?php echo !empty($config_array['nome_empresa']) ? $config_array['nome_empresa'] : "(NAO SETADO)"; ?> </title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="icon" type="icone/png" href="#">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="style/css/materialize-framework.css">
    <link rel="stylesheet" type="text/css" href="style/css/objects/fields.css">
    <link rel="stylesheet" type="text/css" href="style/css/objects/lightpick.css">
    <link rel="stylesheet" type="text/css" href="style/css/objects/toast.css">
    

    <!-- JAVASCRIPT -->
    <script src="style/js/jquery.js"></script>
    <script src="style/js/moment.js"></script>
    <script src="style/js/materialize-init.js"></script>
    <script src="style/js/materialize-framework.js"></script>
    <script src="style/js/objects/lightpick.js"></script>
    <script src="style/js/functions/field-mask.js"></script>
    <script src="style/js/objects/fields.js"></script>
    <script src="style/js/objects/loading.js"></script>
    <script src="style/js/objects/toast.js"></script>
</head>

<body>
    <?php
        include_once 'view/objects/loading.php';

        $root_path = true;
        $script = 'view/website/portfolio/main.php';


        if (isset($_SESSION['usuario_id'])) {
            $script = 'view/administrativo/main.php';
        }

        else if (isset($_SESSION['cliente_id'])) {
            $script = 'view/website/area_cliente/main.php';
        }
        

        include_once $script;
    ?>
</body>
</html>


