

/* JAVASCRIPT - WEBSITE AREA DO CLIENTE - PROJETO FULLVIEW */



$(document).ready(function() {
	//AO CLICAR PARA FECHAR O FULLVIEW
	$('div.projeto-fullview > img.close-fullview').on('click', function() {
		setFullview(null, false);
	});


	$('div.projeto-fullview div.tools span.selecionar-imagem').on('click', function() {
		let salvar_fotos = true;
		let item = $(this);
		let item_modalprojetos_projetoatual = modalprojetos_projetoatual.find('span.selecionar-imagem');
		
		if (item.hasClass('selected')) {
			item.removeClass('selected');
			item_modalprojetos_projetoatual.removeClass('selected');
			modalprojetos_projetoatual_quantidadeimagens_selecionadas --;
		} else {
			if (modalprojetos_projetoatual_quantidadeimagens_permiteselecionar > modalprojetos_projetoatual_quantidadeimagens_selecionadas) {
				item.addClass('selected');
				item_modalprojetos_projetoatual.addClass('selected');
				modalprojetos_projetoatual_quantidadeimagens_selecionadas ++;
			} else {
				let limite = modalprojetos_projetoatual_quantidadeimagens_permiteselecionar;
				showToast(3, `Limite de fotos selecionadas atingido (${limite != 1 ? limite + ' fotos' : '1 foto'})`);

				salvar_fotos = false;
			}
		}

		if (salvar_fotos) {
			salvarFotosSelecionadas();
		}
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
				if (!fullview_tools.find('[data-action=prev]').hasClass('hide')) {
					fullview_tools.find('[data-action=prev]').click();
				}
			}

			//DIREITA (NEXT)
			else if (code == 39) {
				if (!fullview_tools.find('[data-action=next]').hasClass('hide')) {
					fullview_tools.find('[data-action=next]').click();
				}
			}
		}
	});



	//AÇÃO AO CLICAR PARA TROCAR DE IMAGEM (ANTERIOR/PROXIMO)
	$('div.projeto-fullview > div.tools > [data-action=prev], div.projeto-fullview > div.tools > [data-action=next]').on('click', function() {
		alternarVisualizacao($(this));
	});
});





//CRIA O FULLVIEW
function setFullview(image_path, active, item_index) {
	let fullview = $('div.projeto-fullview');
	let fullview_tools = fullview.find('div.tools');
	
	if (active) {
		fullview.find('img.picture').prop('src', image_path);
		fullview_tools.find('[data-action=download]').attr('href', image_path);
		fullview.addClass('active');

		alterarSelecaoImagem();

		if (item_index == 0) {
			$('div.projeto-fullview > div.tools > [data-action=prev]').addClass('hide');
		} else if (item_index == $('div.my-modal[data-modal=projeto] > div.content div.fotoslist > div.item').length - 1 && $('div.my-modal[data-modal=projeto] span.show-more').hasClass('hide')) {
			$('div.projeto-fullview > div.tools > [data-action=next]').addClass('hide');
		}
	}

	else {
		fullview.removeClass('active');

		$('div.projeto-fullview > div.tools > [data-action=prev]').removeClass('hide');
		$('div.projeto-fullview > div.tools > [data-action=next]').removeClass('hide');

		setTimeout(function() {
			fullview.find('img.picture').prop('src', '#');
			fullview_tools.find('[data-action=download]').attr('href', '#');
		}, 500);
	}
}




function alterarSelecaoImagem() {
	if (modalprojetos_projetoatual.find('span.selecionar-imagem').hasClass('selected')) {
		$('div.projeto-fullview > div.tools span.selecionar-imagem').addClass('selected');
	} else {
		$('div.projeto-fullview > div.tools span.selecionar-imagem').removeClass('selected');
	}
}




async function alternarVisualizacao(element) {
	if (!element.hasClass('disabled')) {
		element.addClass('disabled');
		
		let new_item = null;
		let action = element.attr('data-action');

		if (action == 'prev') {
			new_item = modalprojetos_projetoatual.prev().length > 0 ? modalprojetos_projetoatual.prev() : $('div.my-modal[data-modal=projeto] > div.content div.fotoslist > div.item:last');
		}

		else {
			if (modalprojetos_projetoatual.next().length > 0) {
				new_item = modalprojetos_projetoatual.next();
			} else if (!$('div.my-modal[data-modal=projeto] span.show-more').hasClass('hide')) {
				let buscar_finalizada = false;

				buscarMaisFotos(function() {
					buscar_finalizada = true;
				});


				while (!buscar_finalizada) {
					showLoading(true);
					await sleep(100);
				}

				showLoading(false);

				new_item = modalprojetos_projetoatual.next();
			}
		}



		if (new_item.prev().length > 0) {
			$('div.projeto-fullview > div.tools > [data-action=prev]').removeClass('hide');
		} else {
			$('div.projeto-fullview > div.tools > [data-action=prev]').addClass('hide');
		}

		if (new_item.next().length > 0 || !$('div.my-modal[data-modal=projeto] span.show-more').hasClass('hide')) {
			$('div.projeto-fullview > div.tools > [data-action=next]').removeClass('hide');
		} else {
			$('div.projeto-fullview > div.tools > [data-action=next]').addClass('hide');
		}

		setFullview(new_item.attr('data-imageurl'), true);
		modalprojetos_projetoatual = new_item;

		alterarSelecaoImagem();

		element.removeClass('disabled');
	}
}


function sleep(ms) {
 	return new Promise(resolve => setTimeout(resolve, ms));
}