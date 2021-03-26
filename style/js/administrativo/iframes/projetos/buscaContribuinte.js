$(document).ready(function() { 
   
    $('div > input#buscaCliente').keyup(function () { 
        
        var inputValue = $(this).val().trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');

        if(inputValue.length >= 3){
            $('div.cardbox_root').addClass('hide');

            $('div.cardbox_root').each(function() {
                var spanValue = $(this).find('div.cardbox > span.title').text();

                if (spanValue.indexOf(inputValue) > -1) {
                    $(this).removeClass('hide');
                }
            });      
        }

        else {
            $('div.cardbox_root').removeClass('hide');
        }
    });
})
