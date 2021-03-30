

/* JAVASCRIPT - WEBSITE AREA DO CLIENTE - MODAL PROJETOS */


let modalprojetos_projetoatual = null;


//INICIALIZA OS OBJETOS CRIADOS NO MODAL
function initModalProjetos(json_object, callback) {

	let modal = $('div.my-modal[data-modal=projeto]');
	let fotoslist = modal.find('div.content div.fotoslist');

	let diretorio = json_object.diretorio;
	let arquivo_compactado = json_object.arquivo_compactado;


	modal.find('span.title > span.value').html(json_object.titulo);
	modal.find('div.content span.descricao.value').html(json_object.descricao);

	modal.find('span.title > a.download-projetocompleto').attr('href', diretorio + arquivo_compactado.arquivo_completo).attr('download', json_object.titulo.replace(/ /g, '_') + '.' + arquivo_compactado.extensao);


	fotoslist.empty();


	for (let arquivo of json_object.arquivos) {
		let caminho_imagem = diretorio + arquivo;

		let html =	"<div class='item' data-imageurl='" + caminho_imagem + "' style='background-image: url(" + caminho_imagem + ")'>";
            html +=		"<div class='tools'>";
			html +=			"<a href='" + caminho_imagem + "' download data-action='download'> <img src='images/icons/download-white.png'> </a>";
			html +=		"</div>";
			html +=	"</div>";

		fotoslist.append(html);
	}



	fotoslist.find('div.item').on('click', function(event) {
		let item = $(this);
		modalprojetos_projetoatual = item;
		let target = event.target;
		
		if ($(target).closest('div.tools').length == 0 && !$(target).hasClass('tools')) {
			let url_image = item.attr('data-imageurl');
			setFullview(url_image, true);
		}
	});



	if (typeof callback == 'function') {
		callback();
	}

}