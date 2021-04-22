

/* JAVASCRIPT - WEBSITE CONTATO */


$(document).ready(function() {

    //INICIALIZA O FIELD DE DATA
    new Lightpick({ field: document.getElementsByName('data')[0], minDate: moment(), numberOfMonths: 1, dropdowns: { years: { min: 2000, max: 2200, }, months: true } });



    $('div.contato div.formulario button').on('click', function() {
        let button = $(this);
        let form_data = new FormData();
        let prosseguir = true;

        button.prop('disabled', true);


        $('div.contato div.formulario [name]').each(function() {
            let field = $(this);

            if (field.val().trim().length == 0) {
                field.focus();
                prosseguir = false;

                if (openedToasts() < 2) {
                    showToast(3, "Preencha todos os campos para confirmar o envio");
                }

                return false;
            }

            else {
                form_data.append(field.attr('name'), field.val().trim());
            }
        });



        if (prosseguir) {
            showLoading(true);

            $.ajax({
                url: 'controller/website/contato_cliente.php',
                data: form_data,
                method: 'POST',
                cache: false,
                processData: false,
                contentType: false,

                success: function(response) {
                    let json = typeof response == 'object' ? response : JSON.parse(response);

                    showToast(json.code, json.message);
                    showLoading(false);

                    if (json.code == 1) {
                        $('div.contato div.formulario [name]').each(function() {
                            $(this).val('').removeClass('active').find('~ label').removeClass('active');
                        });
                    }
                },

                error: function(response) {
                    showLoading(false);
                    showToast(9, 'Não foi possível enviar as informações preenchidas no formulário');

                    console.log('Error on send AJAX request to save form: ' + JSON.stringify(response));
                }
            });
        }



        setTimeout(function() {
            button.prop('disabled', false);
        }, 1000);
    });
});
