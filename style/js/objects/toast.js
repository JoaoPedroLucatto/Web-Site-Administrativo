

// CUSTOM JS - TOAST

let fixed_coordenate = {};
    fixed_coordenate[true] = 'bottom';
    fixed_coordenate[false] = 'top';



//MOSTRA O TOAST NA TELA
function showToast(code, message, timer = 6000) {
    if (typeof timer != 'number') {
        timer = 6000;
    }


    let toast_id = $.now();
    let icon = null;
    let title = null;
    let color = null;


    if (code == 1) {
        icon = 'check-white.png';
        title = 'Sucesso';
        color = 'green';
    }

    else if (code == 2) {
        icon = 'close-white.png';
        title = 'Erro';
        color = 'red';
    }

    else if (code == 3) {
        icon = 'priorityhigh-white.png';
        title = 'Atenção';
        color = 'amber';
    }

    else {
        icon = 'signalwifi-error-white.png';
        title = 'Falha de Comunicação';
        color = 'grey';
    }


    let toast =     "<div class='customtoast " + color + "' data-customtoastid='" + toast_id + "'>";
        toast +=        "<img src='images/icons/" + icon + "' class='icon'>";
        toast +=        "<span class='text'>";
        toast +=            "<span class='title'> " + title + " </span>";
        toast +=            "<span class='message'> " + message + " </span>";
        toast +=        "</span>";
        toast +=    "</div>";


    $('body').append(toast);
    


    //SELECIONA O TOAST CRIADO E SETA AS TRIGGERS
    let this_toast = $('div.customtoast[data-customtoastid=' + toast_id + ']');


    setTimeout(function() {
        adjustToast(this_toast);
        this_toast.addClass('entry');
    }, 100);



    setTimeout(function() {
        if (this_toast.is(':visible')) {
            closeToast(this_toast);
        }
    }, timer);



    this_toast.on('click', function() {
        closeToast($(this));
    });
}



//FECHA E DESTROI O TOAST CLICADO
function closeToast(element) {
    let small_screen = $(window).width() > 600 ? false : true;
    element.addClass('exit');

    setTimeout(function() {
        let element_height = element.outerHeight();
        element.remove();

        $('div.customtoast:not(.exit)').each(function() {
            let toast_position = $(this).css(fixed_coordenate[small_screen]).replace(/px/g, '');
            let new_position = toast_position - element_height - 12;
                new_position = new_position < 12 ? 12 : new_position;

            $(this).css(fixed_coordenate[small_screen], new_position).css(fixed_coordenate[!small_screen], 'unset');
        });
    }, 500);
}



//AJUSTA O TOAST CRIADO PARA FICAR ABAIXO DO ULTIMO
function adjustToast(element) {
    let prev_toast = element.prev('div.customtoast');

    if (prev_toast.length > 0) {
        let small_screen = $(window).width() > 600 ? false : true;
        let prev_toast_position = prev_toast.css(fixed_coordenate[small_screen]).replace(/px/g, '');
        let prev_toast_height = prev_toast.outerHeight();

        let new_position = parseFloat(prev_toast_position) + parseFloat(prev_toast_height) + 12;
            new_position = new_position < 12 ? 12 : new_position;

        element.css(fixed_coordenate[small_screen], new_position).css(fixed_coordenate[!small_screen], 'unset');
    }
}




//CONTADOR DE TOASTS ABERTOS
function openedToasts() {
    return $('div.customtoast:not(.exit)').length;
}