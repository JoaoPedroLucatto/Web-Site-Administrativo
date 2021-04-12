

// CUSTOM JS - INPUTS

$(document).ready(function() {
    //VERIFICA SE CADA CAMPO ESTA OU NÃO COM VALORES SETADOS PARA INSERIR ANIMAÇÃO
    $('div.inputbox > input.browser-default, div.textareabox > textarea').each(function() {
        animationInput($(this));
    });

 
    //INPUTS
    //AO CLICAR NO LABEL DO INPUT, FOCA NO INPUT ACIMA
    $('div.inputbox > label').on('click', function() {
        $(this).closest('div.inputbox').find('input.browser-default').focus();
    });



    //AO TROCAR O VALOR DE UM INPUT, INSERE A ANIMAÇÃO
    $('input.browser-default').on('blur', function() {
        let input = $(this);
        
        if (input.closest('div.inputbox').length > 0) {
            animationInput(input);
        }
    }).on('focus', function() {
        let input = $(this);
        input.select();
    });




    //TEXTAREA
    //AO CLICAR NO LABEL DO TEXTAREA, FOCA NO TEXTAREA ACIMA
    $('div.textareabox > label').on('click', function() {
        $(this).closest('div.textareabox').find('textarea').focus();
    });



    //AO TROCAR O VALOR DE UM INPUT, INSERE A ANIMAÇÃO
    $('div.textareabox > textarea').on('blur', function() {
        let input = $(this);
        
        if (input.closest('div.textareabox').length > 0) {
            animationInput(input);
        }
    }).on('focus', function() {
        let input = $(this);
        input.select();
    });
});



//INSERE OU REMOVE A ANIMAÇÃO DO INPUT
function animationInput(input) {
    if (input.val().length > 0) {
        input.addClass('active');
    }

    else {
        input.removeClass('active');
        input.val('');
    }
}