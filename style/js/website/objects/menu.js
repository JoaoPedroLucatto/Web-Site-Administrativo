

/* JAVASCRIPT - WEBSITE MENU */


$(document).ready(function() {
    let menu = $('div.header > div.menu');
    let menu_background = $('div.menu-background');

    
    //AO CLICAR EM UM ITEM DO MENU
    menu.find('a.item').on('click', function() {
        let href = $(this).attr('href').replace(/#/g, '');

        //WEBSITE 
        if (href == 'arearestrita') {
            setModal('arearestrita', true);
        }

        //AREA DO CLIENTE
        else if (href == 'logoff') {
            setModal('logoff', true);
        }

        else {
            let sector_scrolltop = $('div[data-scrolltop=' + href + ']').offset().top;

            $('html').animate({
                scrollTop: sector_scrolltop - 50
            }, 500);

            menu_background.removeClass('active');
            menu.removeClass('active');
        }
    });
});
