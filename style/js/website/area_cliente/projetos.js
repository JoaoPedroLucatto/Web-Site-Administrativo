

/* JAVASCRIPT - WEBSITE AREA DO CLIENTE - PROJETOS */

$(document).ready(function() {
    let screen_width = $(window).width();


    $('div.projetoslist > div.item').on('click', function() {
        let projeto_id = $(this).attr('data-projetoid');


        let form_data = new FormData();
        form_data.append('projeto_id', projeto_id);


        $.ajax({
        	url: 'controller/website/area_cliente/buscar_projeto.php',
        	method: 'POST', 
        	data: form_data,
            cache: false,
            processData: false,
            contentType: false,

        	success: function(response) {
        		let json = typeof response == 'object' ? response : JSON.parse(response);


        		if (json.code == 1) {

	        		initModalProjetos(json.message, () => {
	        			setModal('projeto', true);
	        		});
        		}

        		else {
        			showToast(json.code, json.message);
        		}
        	},

        	error: function(response) {
        		showLoading(false);
				showToast(9, 'Ocorreu um erro ao tentar abrir o projeto selecionado');

				console.log('Error on send AJAX request to find project details: ' + JSON.stringify(response));
        	}
        });
    });
});

