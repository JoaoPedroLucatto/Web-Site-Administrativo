

/* JAVASCRIPT - WEBSITE AREA DO CLIENTE - PROJETOS */

$(document).ready(function() {
    let screen_width = $(window).width();


    $('div.projetoslist > div.item').on('click', function() {
        let projeto_id = $(this).attr('data-projetoid');
        let permite_selecionar = $(this).attr('data-permiteselecionar');
        let permite_download = $(this).attr('data-permitedownload');


        let form_data = new FormData();
        form_data.append('action', 'get_project');
        form_data.append('contador_imagens', 0);
        form_data.append('projeto_id', projeto_id);

        showLoading(true);


        $.ajax({
        	url: 'controller/website/area_cliente/buscar_projeto.php',
        	method: 'POST', 
        	data: form_data,
            cache: false,
            processData: false,
            contentType: false,

        	success: function(response) {
                showLoading(false);
        		let json = typeof response == 'object' ? response : JSON.parse(response);

        		if (json.code == 1) {
                    json.message.permite_selecionar = permite_selecionar;
                    json.message.permite_download = permite_download;


                    if (json.message.arquivos.length == 0) {
                        showToast(3, 'Nenhuma foto foi encontrada vinculada ao projeto');
                    } else {
    	        		initModalProjetos(json.message, () => {
    	        			setModal('projeto', true);
    	        		});
                    }
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

