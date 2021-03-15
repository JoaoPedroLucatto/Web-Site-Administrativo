

/* JAVASCRIPT - WEBSITE AREA DO CLIENTE - PROJETOS */

$(document).ready(function() {
    let screen_width = $(window).width();


    $('div.projetoslist > div.item').on('click', function() {
        let id = $(this).attr('data-projetoid');

        initModalProjetos();
        setModal('projeto', true);
    });
});

