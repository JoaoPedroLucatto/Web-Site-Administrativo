

/* JAVASCRIPT - WEBSITE PORTFOLIO */


$(document).ready(function() {

    //INICIALIZA O ITENS DO PORTFOLIO E O BOTÃO DE EXIBIÇÃO (CASO NECESSARIO)
    let portfolioitens = $('div.portfoliolist > div.item');
    let count = 0;


    portfolioitens.each(function() {
        if (count <= 3) {
            $(this).removeClass('hide');
            count ++;
        }

        else {
            return true;
        }
    });


    if (portfolioitens.length > 4) {
        $('div.portfoliolist ~ div.show-more').removeClass('hide');
    }







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
