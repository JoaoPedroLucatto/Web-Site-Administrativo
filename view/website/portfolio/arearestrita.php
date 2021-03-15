


<div class="modal-background" data-modal='arearestrita'> </div>

<div class="my-modal" data-modal='arearestrita'>
    <span class="title">
        Área Restrita
        <img src="images/icons/close-black.png" class="mymodal-close">
    </span>

    <div class="content">
        <div class="row">
            <div class="col s12">
                <span class="value"> Informe suas credenciais para visualizar e utilizar diversas funcionalidades de nosso sistema!</span>
            </div>

            <div class="col s12 inputbox">
                <input type="text" name="login" class="browser-default">
                <label>Login</label>
            </div>

            <div class="col s12 inputbox">
                <input type="password" name="senha" class="browser-default">
                <label>Senha</label>
            </div>
        </div>
    </div>

    <div class="footer">
        <button class="blue darken-3 full-width"> <img src="images/icons/check-white.png"> Iniciar Sessão </button>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        let modal_arearestrita = $('div.my-modal[data-modal=arearestrita]');


        //AO PRESSIONAR ENTER NOS INPUTS, CLICA NO BOTÃO
        modal_arearestrita.find('div.content input[name]').on('keyup', function(event) {
            let char = event.keyCode || event.which;

            //ENTER
            if (char == 13) {
                modal_arearestrita.find('div.footer > button').click();
            }
        });


        //AO ENVIAR O FORMULÁRIO DE LOGIN
        modal_arearestrita.find('div.footer > button').on('click', function() {
            let button = $(this);

            if (!button.is(':disabled')) {
                let login = modal_arearestrita.find('div.content input[name=login]');
                let senha = modal_arearestrita.find('div.content input[name=senha]');

                if (login.val().trim().length == 0) {
                    login.focus();
                }

                else if (senha.val().trim().length == 0) {
                    senha.focus();
                }

                else {
                    showLoading(true);
                    button.prop('disabled', true);


                    $.ajax({
                        url: 'controller/login/login.php',
                        method: 'POST',
                        data: 'login=' + login.val() + '&senha=' + senha.val(),

                        success: function(response) {
                            showLoading(false);

                            let json = JSON.parse(response);
                            

                            if (json.code == 1) {
                                location.reload(true);
                            }

                            else {
                                showToast(json.code, json.message);
                            }
                        },

                        error: function(response) {
                            showLoading(false);
                            senha.focus();

                            showToast(9, 'Não foi possível enviar as informações para realização do Login');
                        }
                    });


                    setTimeout(function() {
                        button.prop('disabled', false);
                    }, 1000);
                }
            }
        });
    });    
</script>