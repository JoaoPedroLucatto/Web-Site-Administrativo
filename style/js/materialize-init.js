

/* JAVASCRIPT - INICIALIZA OS OBJETOS MATERIALIZE */

$(document).ready(function() {

    $('.slider').slider({
        full_width: true,
        indicators: false,
        interval: 5000
    });

    
    
    /* TABS */
    $('.tabs').tabs();
    $('.tooltipped').tooltip();



    //APLICA AS MÁSCARAS PARA CADA TIPO DE CAMPO
	$('input.date-mask').mask('00/00/0000', {clearIfNotMatch: true, selectOnFocus: true});
    $('input.hour-mask').mask('00:00', {clearIfNotMatch: true, selectOnFocus: true});
    $('input.cpf-mask').mask('000.000.000-00', {clearIfNotMatch: true, selectOnFocus: true});
    $('input.cpf-mask.not-required').mask('000.000.000-00', {selectOnFocus: true});
    $('input.cep-mask').mask('00000-000', {clearIfNotMatch: true, selectOnFocus: true});
    $('input.phone-mask').mask('(00) 0000-0000', {clearIfNotMatch: true, selectOnFocus: true});
    $('input.cellphone-mask').mask('(00) 00000-0000', {clearIfNotMatch: true, selectOnFocus: true});
    $('input.cellphonewithddi-mask').mask('00 00 000000000', {clearIfNotMatch: true, selectOnFocus: true});
    $('input.money-mask').mask("#0.00", {selectOnFocus: true, reverse: true});

});
