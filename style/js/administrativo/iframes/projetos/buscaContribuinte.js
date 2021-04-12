$(document).ready(function () {

    $('div.cardbox_root').addClass('hide');

    /* CHECKBOX PARA EXIBIR TODOS OS CLIENTES */
    $('input[name="exibir"]').on("change", function() {
        
        if($(this).is(":checked") == true){

            $('div.cardbox_root').removeClass('hide');

        }
        else{
            $('div.cardbox_root').each(function() {

                if ($(this).find('label > input[type="checkbox"]').is(":checked") == false) {

                    $(this).addClass('hide');
        
                }
            });
        }
    });

        
    /* MOSTRAR SOMENTE OS CLIENTES RELACIONADO COM O PROJETO */
    $('div.cardbox_root').each(function () {

        if ($(this).find('label > input[type="checkbox"]').is(":checked") == true) {

            $(this).removeClass('hide');

        }
    })


    /* PESQUISA DO CLIENTE */
    $('div > input#buscaCliente').keyup(function () {

        var inputValue = $(this).val().trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');

        if (inputValue.length >= 3) {

            $('div.cardbox_root').each(function () {
                var spanValue = $(this).find('div.cardbox > span.title').text();

                if (spanValue.indexOf(inputValue) > -1) {

                    $(this).removeClass('hide');

                }
                else if ($(this).find('label > input[type="checkbox"]').is(":checked") == false) {

                    $(this).addClass('hide');
                }

            });
        }
    });
});
