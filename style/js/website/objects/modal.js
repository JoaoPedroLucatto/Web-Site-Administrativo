

/* JAVASCRIPT - WEBSITE MODAL */


$(document).ready(function() {
    //AO CLICAR NO GATILHO DE FECHAMENTO DO MODAL
    $('div.my-modal > span.title > img.mymodal-close').on('click', function() {
        let data_modal = $(this).closest('div.my-modal').attr('data-modal');
        setModal(data_modal, false);
    });



    //ABRE O MODAL AO CLICAR NO GATILHO
    $('[data-modaltrigger]').on('click', function() {
        let modal_trigger = $(this);
        setModal(modal_trigger.attr('data-modaltrigger'), true);
    });
});



function setModal(data_modal, active) {
    if (active) {
        $('body').css('overflow', 'hidden');

        $('div.modal-background[data-modal=' + data_modal + ']').addClass('active');
        $('div.my-modal[data-modal=' + data_modal + ']').addClass('active').find('input:eq(0)').focus();
    }

    else {
        $('body').css('overflow', 'auto');

        $('div.modal-background[data-modal=' + data_modal + ']').removeClass('active');
        $('div.my-modal[data-modal=' + data_modal + ']').removeClass('active');
    }
}
