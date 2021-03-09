
<!-- CSS -->
<link rel="stylesheet" href="style/css/administrativo/header-principal.css">


<div class="header-principal">
        <h4 class="flow-text">Painel Administrativo</h4>
        <div class="exit">
                <a href="#"><img src="images/icons/exit_to_app_black.png"></a>
        </div>
</div>



<script type="text/javascript">
	$(document).ready(function() {
		$('div.header-principal > div.exit > a').on('click', function() {
			showLoading(true);

			
			$.ajax({
				url: 'controller/login/logoff.php',
				method: 'POST',

				success: function(response) {
					showLoading(false);

					let json = JSON.parse(response);
                            

					if (json.code == 1) {
						location.reload(true);
					}

                    else {
                        showToast(json.code, json.message);
                    }
                },

				error: function(response) {
					showLoading(false);

                    showToast(9, 'Não foi possível enviar as informações para realização do Logoff');
                }
            });
		});
	});
</script>

