

<?php
	if (!isset($root_path)) {
		header('location: ../../');
	}
?>


<link rel="stylesheet" type="text/css" href="style/css/website/objects/content.css">
<link rel="stylesheet" type="text/css" href="style/css/website/objects/modal.css">


<script type="text/javascript" src="style/js/website/objects/modal.js"></script>


<div class="row">
    <?php
        include_once 'objects/header.php';
        include_once 'projetos.php';
        include_once 'objects/footer.php';
        include_once 'logoff.php';
    ?>
</div>