

/* JAVASCRIPT - WEBSITE AREA DO CLIENTE - MODAL PROJETOS */


let modalprojetos_projetoatual = null;

let modalprojetos_projetoatual_id = null;
let modalprojetos_projetoatual_diretorio = null;
let modalprojetos_projetoatual_contadorimagens = 0;

let modalprojetos_projetoatual_fotosselecionadas_text = null;
let modalprojetos_projetoatual_quantidadeimagens_permiteselecionar = 0;
let modalprojetos_projetoatual_quantidadeimagens_selecionadas = 0;

let modalprojetos_projetoatual_permiteselecionar = null;
let modalprojetos_projetoatual_permitedownload = null;




$(document).ready(function() {

	//BUSCAR MAIS IMAGENS DO PROJETO
	$('div.my-modal[data-modal=projeto] span.show-more').on('click', function() {
		buscarMaisFotos();
	});

});




//INICIALIZA OS OBJETOS CRIADOS NO MODAL
function initModalProjetos(json_object, callback) {

	modalprojetos_projetoatual_id = json_object.id;
	modalprojetos_projetoatual_contadorimagens = 0;
	
	modalprojetos_projetoatual_fotosselecionadas_text = json_object.fotos_selecionadas;
	modalprojetos_projetoatual_quantidadeimagens_permiteselecionar = json_object.quantidade_fotos_selecionar;
	modalprojetos_projetoatual_quantidadeimagens_selecionadas = json_object.quantidade_fotos_selecionadas;

	modalprojetos_projetoatual_permiteselecionar = json_object.permite_selecionar == 1;
	modalprojetos_projetoatual_permitedownload = json_object.permite_download == 1;


	let modal = $('div.my-modal[data-modal=projeto]');
	let projeto_fullview = $('div.projeto-fullview');
	
	let fotoslist = modal.find('div.content div.fotoslist');

	modalprojetos_projetoatual_diretorio = json_object.diretorio;
	let arquivo_compactado = json_object.arquivo_compactado;


	modal.find('span.title > span.value').html(json_object.titulo);
	modal.find('div.content span.descricao.value').html(json_object.descricao);

	if (modalprojetos_projetoatual_permitedownload) {
		modal.find('span.title > a.download-projetocompleto').attr('href', modalprojetos_projetoatual_diretorio + arquivo_compactado.arquivo_completo).attr('download', json_object.titulo.replace(/ /g, '_') + '.' + arquivo_compactado.extensao).removeClass('hide');
		projeto_fullview.find('[data-action=download]').removeClass('hide');
	} else {
		modal.find('span.title > a.download-projetocompleto').attr('href', '#').attr('download', '#').addClass('hide');
		projeto_fullview.find('[data-action=download]').addClass('hide');
	}


	if (modalprojetos_projetoatual_permiteselecionar) {
		projeto_fullview.find('span.selecionar-imagem').removeClass('hide');
	} else {
		projeto_fullview.find('span.selecionar-imagem').addClass('hide');
	}


	if (json_object.mostrar_mais) {
		modal.find('span.show-more').removeClass('hide');
	} else {
		modal.find('span.show-more').addClass('hide');
	}


	gerarListaFotos(json_object, true, function() {
		if (typeof callback == 'function') {
			callback();
		}
	});
}






function gerarListaFotos(json_object, clear_fotoslist = false, callback = null) {
	let modal = $('div.my-modal[data-modal=projeto]');
	let fotoslist = modal.find('div.content div.fotoslist');

	if (clear_fotoslist) {
		fotoslist.empty();
	}


	for (let imagem of json_object.arquivos) {
		let caminho_imagem = modalprojetos_projetoatual_diretorio + imagem.arquivo;

		let html =	"<div class='item' data-imageurl='" + caminho_imagem + "' data-imagem='" + imagem.arquivo + "'>";
			html +=		"<img src='" + caminho_imagem + "' class='lazy-picture picture'>";

		if (modalprojetos_projetoatual_permitedownload || modalprojetos_projetoatual_permiteselecionar) {
			let selecionada = modalprojetos_projetoatual_fotosselecionadas_text && modalprojetos_projetoatual_fotosselecionadas_text.indexOf(`</>${imagem.arquivo}</>`) > -1 ? 'selected' : '';

			html +=		"<div class='tools'>";
			html +=			modalprojetos_projetoatual_permiteselecionar ? `<span class='selecionar-imagem ${selecionada}'> </span>` : '';
			html +=			modalprojetos_projetoatual_permitedownload ? "<a href='" + caminho_imagem + "' download data-action='download'> <img src='images/icons/download-white.png'> </a>" : '';
			html +=		"</div>";
		}

			html +=	"</div>";

		fotoslist.append(html);
		modalprojetos_projetoatual_contadorimagens ++;
	}

	initLazyPictures();


	fotoslist.find('div.item').on('click', function(event) {
		let item = $(this);
		modalprojetos_projetoatual = item;
		let target = event.target;
		
		if ($(target).closest('div.tools').length == 0 && !$(target).hasClass('tools')) {
			let url_image = item.attr('data-imageurl');
			setFullview(url_image, true, item.index());
		}
	});


	fotoslist.find('div.item div.tools span.selecionar-imagem').on('click', function() {
		let salvar_fotos = true;
		let item = $(this);
		
		if (item.hasClass('selected')) {
			item.removeClass('selected');
			modalprojetos_projetoatual_quantidadeimagens_selecionadas --;
		} else {
			if (modalprojetos_projetoatual_quantidadeimagens_permiteselecionar > modalprojetos_projetoatual_quantidadeimagens_selecionadas) {
				item.addClass('selected');
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


	if (typeof callback == 'function') {
		callback();
	}
}




function buscarMaisFotos(callback = null) {
	let modal = $('div.my-modal[data-modal=projeto]');

	let form_data = new FormData();
        form_data.append('action', 'more_pictures');
        form_data.append('contador_imagens', modalprojetos_projetoatual_contadorimagens);
        form_data.append('projeto_id', modalprojetos_projetoatual_id);

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
        		if (json.message.mostrar_mais) {
					modal.find('span.show-more').removeClass('hide');
				} else {
					modal.find('span.show-more').addClass('hide');
				}

                gerarListaFotos(json.message, false, null);

				if (typeof callback != null) {
					callback();
				}
        	}

        	else {
       			showToast(json.code, json.message);
       		}
       	},

        error: function(response) {
       		showLoading(false);
			showToast(9, 'Ocorreu um erro ao tentar buscar mais fotos do projeto');

			console.log('Error on send AJAX request to find more project pictures: ' + JSON.stringify(response));
        }
    });
}






function salvarFotosSelecionadas() {
	let fotosselecionadas_text = '';

	$('div.my-modal[data-modal=projeto] div.content div.fotoslist div.item').each(function() {
		let element = $(this);
		let foto_selecionada = element.find('span.selecionar-imagem').hasClass('selected');
		
		if (foto_selecionada) {
			fotosselecionadas_text += `</>${element.attr('data-imagem')}</>`;
		}
	});


	let form_data = new FormData();
        form_data.append('projeto_id', modalprojetos_projetoatual_id);
        form_data.append('fotos_selecionadas', fotosselecionadas_text);

	$.ajax({
        url: 'controller/website/area_cliente/salvar_fotos_selecionadas.php',
        method: 'POST', 
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,

        success: function(response) {
        	let json = typeof response == 'object' ? response : JSON.parse(response);

        	if (json.code != 1) {
       			showToast(json.code, json.message);
       		}
       	},

        error: function(response) {
			showToast(9, 'Ocorreu um erro ao tentar salvar as fotos selecionadas');

			console.log('Error on send AJAX request to save selected pictures: ' + JSON.stringify(response));
        }
    });
}