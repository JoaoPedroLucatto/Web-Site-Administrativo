

/* JAVASCRIPT - WEBSITE AREA DO CLIENTE - PROJETO FULLVIEW */



$(document).ready(function() {
	//AO CLICAR PARA FECHAR O FULLVIEW
	$('div.projeto-fullview > img.close-fullview').on('click', function() {
		setFullview(null, false);
	});



	//AO CLICAR NAS SETAS PARA TROCA DA IMAGEM
	$(document).on('keyup', function(event) {
		let code = event.keyCode || event.which;

		if ($('div.projeto-fullview').hasClass('active')) {
			let fullview_tools = $('div.projeto-fullview > div.tools');

			//ESC
			if (code == 27) {
				setFullview(null, false);
			}

			//ESQUERDA (PREV)
			else if (code == 37) {
				fullview_tools.find('[data-action=prev]').click();
			}

			//DIREITA (NEXT)
			else if (code == 39) {
				fullview_tools.find('[data-action=next]').click();
			}
		}
	});



	//AÇÃO AO CLICAR PARA TROCAR DE IMAGEM (ANTERIOR/PROXIMO)
	$('div.projeto-fullview > div.tools > [data-action=prev], div.projeto-fullview > div.tools > [data-action=next]').on('click', function() {
		let new_item = null;
		let action = $(this).attr('data-action');

		if (action == 'prev') {
			new_item = modalprojetos_projetoatual.prev().length > 0 ? modalprojetos_projetoatual.prev() : $('div.my-modal[data-modal=projeto] > div.content div.fotoslist > div.item:last');
		}

		else {
			new_item = modalprojetos_projetoatual.next().length > 0 ? modalprojetos_projetoatual.next() : $('div.my-modal[data-modal=projeto] > div.content div.fotoslist > div.item:first');
		}


		setFullview(new_item.attr('data-imageurl'), true);
		modalprojetos_projetoatual = new_item;
	});
});





//CRIA O FULLVIEW
function setFullview(image_path, active) {
	let fullview = $('div.projeto-fullview');
	let fullview_tools = fullview.find('div.tools');
	
	if (active) {
		fullview.find('img.picture').prop('src', image_path);
		fullview_tools.find('[data-action=download]').attr('href', image_path);
		fullview.addClass('active');
	}

	else {
		fullview.removeClass('active');

		setTimeout(function() {
			fullview.find('img.picture').prop('src', '#');
			fullview_tools.find('[data-action=download]').attr('href', '#');
		}, 500);
	}
}