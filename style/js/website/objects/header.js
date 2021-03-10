

/* JAVASCRIPT - WEBSITE HEADER */


$(document).ready(function() {
    setHeaderTheme();


    setInterval(function() {
        setHeaderTheme();
    }, 5550);


    let header = $('div.header');
    let menu = $('div.header > div.menu');
    let menu_background = $('div.menu-background');

    
    //AO CLICAR NO GATILHO DO MENU (TELA MÉDIA OU PEQUENA)
    $('div.header img.menu-trigger').on('click', function() {
        if (menu.hasClass('active')) {
            menu_background.removeClass('active');
            menu.removeClass('active');
        }

        else {
            menu_background.addClass('active');
            menu.addClass('active');
        }
    });



    //AO CLICAR NO BACKGROUND DO MENU, REMOVE O MENU DA TELA
    menu_background.on('click', function() {
        menu_background.removeClass('active');
        menu.removeClass('active');
    });



    //AO ROLAR O SCROLL DO NAVEGADOR
    $(window).on('scroll', function() {
        let scroll_top = $(window).scrollTop();

        if (scroll_top >= 50) {
            header.addClass('active');
        }

        else {
            header.removeClass('active');
        }
    });
});



//AJUSTA O HEADER DE ACORDO COM A COR DA IMAGEM
function setHeaderTheme() {
    let header = $('div.header');
    let current_slide = $('div.slider > ul.slides > li.active');

    if (current_slide.attr('data-darktheme') == 'true') {
        header.addClass('darken');
    }

    else {
        header.removeClass('darken');
    }
}
