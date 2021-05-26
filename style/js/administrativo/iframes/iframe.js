


/* ---------- JAVASCRIPT IFRAME HEADER ---------- */

$(document).ready(function() {
 
    //AO CLICAR EM UM BOTAO DO HEADER
    $('img.actuator:not(.internal)[data-actuator]').on('click', function() {
        let action = $(this).data('actuator');

        if (action == 'reload') {
            window.parent.showLoading(true);
            window.location = 'controlador.php';
        }

        else if (action == 'submenu') {
            let submenu_action = $(this).data('submenu');
            
            $('div.submenu-background[data-action='+submenu_action+']').addClass('active');
            $('div.submenu[data-action='+submenu_action+']').addClass('active');
        }
    });


    //AÇÃO AO CLICAR NO BOTÃO DE FECHAMENTO DO SUBMENU
    $('div.submenu > span.title > img.submenu-close, div.submenu-background, div.submenu .click-close').on('click', function() {
        let submenu = $(this).closest('[data-action]').data('action');

        $('div.submenu-background[data-action='+submenu+']').removeClass('active');
        $('div.submenu[data-action='+submenu+']').removeClass('active');

        $('div.search-table.active > input[name=search-table]').focus();
    });



    //AO CLICAR EM ESC, FECHA O PRIMEIRO SUBMENU QUE ESTIVER ABERTO
    $(document).on('keyup', function(event) {
        let code = event.keyCode || event.which;

        if (code == 27) {
            $('div.submenu-background.active:eq(0)').click();
        }
    });
});






/* ---------- JAVASCRIPT IFRAME LISTAGEM ---------- */

$(document).ready(function() {
    let btn_edit = $('div.iframe-footer > button[value=edit]');
    let btn_delete = $('div.iframe-footer > button[value=delete]');


    //AO CLICAR NO CHECKBOX MARCAR TODOS
    $('input.check-all').on('click', function() {
    	let checked = $(this).is(':checked');
    	$('table:visible > tbody > tr > td').find('input.check-table:visible:enabled').prop('checked', checked);

    	verifyCheckboxes(btn_edit, btn_delete);
    });
    

    //AÇÃO AO CLICAR NO CHECKBOX DA TABELA
    $('input.check-table').on('click', function() {
    	verifyCheckboxes(btn_edit, btn_delete);
    });


    //AÇÃO AO DAR DUPLO CLIQUE NA LINHA DO REGISTRO
    $('table > tbody > tr:not(.not-editable)').on('dblclick', function() {
    	let id = $(this).find('input.check-table').val();
    	window.location = 'controlador.php?trigger=edit&row_id[]='+id;
    });


    //AÇÃO AO CLICAR NO BOTÃO DE RETORNO
    $('div.iframe-footer > button[name=backscreen]').on('click', function() {
        window.location = $(this).val();
    });
});



//VERIFICA OS CHECKBOX SELECIONADOS
function verifyCheckboxes(btn_edit, btn_delete) {
	let total_check = $('table:visible > tbody > tr > td input.check-table:visible:enabled').length;
    let total_checked = $('table:visible > tbody > tr > td input.check-table:visible:enabled:checked').length;

    btn_edit.prop('disabled', total_checked == 1 ? false : true);
    btn_delete.prop('disabled', total_checked > 0 ? false : true);

    $('input.check-all').prop('checked', total_checked == total_check ? true : false);
}



//BLOQUEIA O CADASTRO CASO O FORM SECUNDARIO ESTEJA EM ATIVIDADE
function blockForm(blocked) {
    if (blocked) {
        $('div.iframe-content ul.tabs.main > li.tab > a:not(.active)').closest('li.tab').addClass('disabled');
        $('div.iframe-footer > button').prop('disabled', true);
    }

    else {
        $('div.iframe-content ul.tabs.main > li.tab.disabled').removeClass('disabled');
        $('div.iframe-footer > button').prop('disabled', false);
    }
}







/* ---------- JAVASCRIPT IFRAME VERIFY FIELDS ---------- */

$(document).ready(function() {

    $(document).on('beforeunload', function() {
        window.parent.showLoading(true);
    });
     
    //AO TROCAR O VALOR DE UM CAMPO, FAZ REQUISIÇÃO REALTIME NO BANCO (APENAS INPUTS QUE PERMITEM A BUSCA)
    $('input.browser-default[data-findcolumn]').on('change', function() {
        let input = $(this);

        //REMOVE OS PONTOS CASO TENHA A CLASSE ESPECIFICA
        if (input.hasClass('clearpoints')) {
            input.val(input.val().replace(/\D+/g, ''));
        }
        

        if (input.val().length > 0) {
            let url = $(this).closest('form').data('findtable');
            let column = '?column=' + $(this).data('findcolumn');
            let notfindid = '&notfindid=' + $(this).data('notfindid');

            value = '&value=' + input.val();

            $.get(url + column + value + notfindid, function(response) {
                let dados = JSON.parse(response);

                if (dados.status == 'error') {
                    input.addClass('error').find('~ span.helper-text-input').html(dados.message);
                }

                else {
                    input.removeClass('error').find('~ span.helper-text-input').html(dados.message);
                }
            });
        }

        else {
            if (input.is(':required')) {
                input.addClass('error').find('~ span.helper-text-input').html('* Obrigatório');
            }

            else {
                input.removeClass('error').find('~ span.helper-text-input').html('');
            }
        }
    });



    //AO CLICAR NO BOTÃO DE SALVAR, VERIFICA SE TEM ALGUM INPUT OBRIGATORIO SEM PREENCHIMENTO
    $('button.save-form').on('click', function() {
        let button = $(this);
        let prosseguir = true;

        
        $(this).closest('form').find("input:checkbox[name='row_id[]']").each(function () {
            let inputChecked = $(this);

            if(inputChecked.is(':checked')){      

                $('input#buscaCliente').removeAttr('required');
                prossegui = false;
                return false;

            }
       });
        
        
        $(this).closest('form').find('input:required').each(function() {
            let input = $(this);
        
            if (input.attr('text') == 'number') {
                //VERIFICA SE DEVE SER PASSADO APENAS 2 CASAS DECIMAIS
                if (input.attr('step') == '0.01') {
                    input.val(parseFloat(input.val()).toFixed(2));
                }


                //VERIFICA SE FOI PASSADO VALOR MINIMO NO INPUT, E SE O VALOR ATUAL É COMPATIVEL COM O REQUISITO
                if (input.attr('min') && parseFloat(input.attr('min')).toFixed(2) > parseFloat(input.val()).toFixed(2)) {
                    //REDIRECIONA PARA A TAB PRINCIPAL ONDE O CAMPO ESTA
                    if (!input.is(':visible')) {
                        let tab = $(this).closest('div[id]').prop('id');
                        $('ul.tabs.main').tabs('select', tab);
                    }

                    input.addClass('error').find('~ span.helper-text-input').html('* Obrigatório');
                    input.select();

                    prosseguir = false;
                    return false;
                }

                //VERIFICA SE FOI PASSADO VALOR MAXIMO NO INPUT, E SE O VALOR ATUAL É COMPATIVEL COM O REQUISITO
                if (input.attr('max') && parseFloat(input.attr('max')).toFixed(2) < parseFloat(input.val()).toFixed(2)) {
                    //REDIRECIONA PARA A TAB PRINCIPAL ONDE O CAMPO ESTA
                    if (!input.is(':visible')) {
                        let tab = $(this).closest('div[id]').prop('id');
                        $('ul.tabs.main').tabs('select', tab);
                    }

                    input.addClass('error').find('~ span.helper-text-input').html('* Obrigatório');
                    input.select();

                    prosseguir = false;
                    return false;
                }
            }


            input.val(input.val().trim());  //PREENCHE O INPUT COM SEU VALOR, MAS SEM OS ESPAÇOS INICIAIS E FINAIS

            if (input.val().length == 0) {
                input.addClass('error');
                    
                //REDIRECIONA PARA A TAB PRINCIPAL ONDE O CAMPO ESTA
                if (!input.is(':visible')) {
                    let tab = $(this).closest('div[id]').prop('id');
                    $('ul.tabs').tabs('select', tab);
                }

                prosseguir = false;
                return false;
            }

            else {
                input.removeClass('error').find('~ span.helper-text-input').html('');
            }
        });


        $(this).closest('form').find('textarea:required').each(function() {
            let textarea = $(this);
            
            textarea.val(textarea.val().trim());  //PREENCHE O TEXTAREA COM SEU VALOR, MAS SEM OS ESPAÇOS INICIAIS E FINAIS

            if (textarea.val().length == 0) {
                
                //REDIRECIONA PARA A TAB PRINCIPAL ONDE O CAMPO ESTA
                if (!textarea.is(':visible')) {
                    let tab = $(this).closest('div[id]').prop('id');
                    $('ul.tabs.main').tabs('select', tab);
                }

                prosseguir = false;
                return false;
            }

            else {
                textarea.removeClass('error');
            }
        });
        window.parent.showLoading(false);
    });
});





/* ---------- JAVASCRIPT IFRAME DELETE ---------- */

$(document).ready(function() {
    //AO CLICAR NO CARDBOX, TROCA O STATUS DO CHECKBOX DENTRO DELE
    $('div.cardbox').on('click', function() {
        let checkbox = $(this).find('label.checkbox > input');
        checkbox.prop('checked', !checkbox.is(':checked'));
    });


    window.parent.showLoading(false);
});
