$(document).ready(function () {

    /* SELECT TIPO REGISTRO SLIDER/PORTFÓLIO */
    $('select[name="tipo_registro"]').on('change', function () {

        var tipoRegistro = $(this).val();

        /* SLIDER */
        if (tipoRegistro == 1) {

            $('div.selectbox#cor_texto').removeClass('hide');
            $('div.selectbox#posicao_texto').removeClass('hide');
            $('div.inputbox#subtitulo_2').addClass('hide');
            $('div.inputbox#link_video').addClass('hide');

        }
        /* PORTFÓLIO */
        else{
            $('div.inputbox#subtitulo_1').removeClass('hide');
            $('div.inputbox#subtitulo_2').removeClass('hide');
            $('div.inputbox#link_video').removeClass('hide');
            $('div.selectbox#cor_texto').addClass('hide');
            $('div.selectbox#posicao_texto').addClass('hide');

        }
    })
});