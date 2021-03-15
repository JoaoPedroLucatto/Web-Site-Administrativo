

<?php
	if (!isset($root_path)) {
		header('location: ../../');
	}
?>



<link rel="stylesheet" href="style/css/administrativo/content.css">
<link rel="stylesheet" href="style/css/administrativo/iframes/iframe.css">

<script type="text/javascript" src="style/js/administrativo/iframes/content.js"></script>

<?php
    include_once "objects/header-principal.php";
    include_once "objects/menu-lateral.php";
    include_once "objects/content.php";
?>
