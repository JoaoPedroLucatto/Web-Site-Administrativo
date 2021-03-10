

/* JAVASCRIPT - WEBSITE PORTFOLIO */


$(document).ready(function() {
    //AO CLICAR EM MOSTRAR MAIS NA SESSÃO PORTFOLIO
    $('div.portfoliolist ~ div.show-more > span').on('click', function() {
        let count = 0;

        $('div.portfoliolist > div.item.hide').each(function() {
            if (count < 4) {
                $(this).removeClass('hide');
            }

            else {
                return false;
            }
            
            count ++;
        });


        //CASO NÃO TENHA MAIS NENHUMA IMAGEM PARA CARREGAR, OCULTA O GATILHO
        if ($('div.portfoliolist > div.item.hide').length == 0) {
            $('div.portfoliolist ~ div.show-more').addClass('hide');
        }
    });
});
