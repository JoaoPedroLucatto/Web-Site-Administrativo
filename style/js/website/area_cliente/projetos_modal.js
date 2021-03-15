

/* JAVASCRIPT - WEBSITE AREA DO CLIENTE - MODAL PROJETOS */


let modalprojetos_projetoatual = null;


//INICIALIZA OS OBJETOS CRIADOS NO MODAL
function initModalProjetos() {
	$('div.my-modal[data-modal=projeto] > div.content div.fotoslist > div.item').on('click', function(event) {
		let item = $(this);
		modalprojetos_projetoatual = item;
		let target = event.target;
		
		if ($(target).closest('div.tools').length == 0 && !$(target).hasClass('tools')) {
			let url_image = item.attr('data-imageurl');
			setFullview(url_image, true);
		}
	});
}