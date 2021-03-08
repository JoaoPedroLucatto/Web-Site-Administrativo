
<!DOCTYPE html>
<html>
<head>
    <title> Titulo (Buscar do banco de dados) </title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="icon" type="icone/png" href="#">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="style/css/materialize-framework.css">
    <link rel="stylesheet" type="text/css" href="style/css/objects/fields.css">
    <link rel="stylesheet" type="text/css" href="style/css/objects/lightpick.css">
    

    <!-- JAVASCRIPT -->
    <script src="style/js/jquery.js"></script>
    <script src="style/js/moment.js"></script>
    <script src="style/js/materialize-init.js"></script>
    <script src="style/js/materialize-framework.js"></script>
    <script src="style/js/objects/lightpick.js"></script>
    <script src="style/js/functions/field-mask.js"></script>
    <script src="style/js/objects/fields.js"></script>
    <script src="style/js/objects/loading.js"></script>
</head>

<body>
    <?php
        include_once 'view/objects/loading.php';

        $script = 'view/website/portfolio/main.php';

        



        include_once $script;
    ?>
</body>
</html>


