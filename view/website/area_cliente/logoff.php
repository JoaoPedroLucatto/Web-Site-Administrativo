


<div class="modal-background" data-modal='logoff'> </div>

<div class="my-modal" data-modal='logoff'>
    <span class="title">
        Encerrar Sessão
        <img src="images/icons/close-black.png" class="mymodal-close">
    </span>

    <div class="content">
        <div class="row">
            <div class="col s12">
                <span class="value"> Deseja realmente encerrar sua sessão em nossa plataforma?</span>
            </div>
        </div>
    </div>

    <div class="footer">
        <button class="blue darken-3 full-width"> <img src="images/icons/opendoor-white.png"> Encerrar Sessão </button>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $('div.my-modal[data-modal=logoff] > div.footer > button').on('click', function() {
            showLoading(true);

            
            $.ajax({
                url: 'controller/login/logoff.php',
                method: 'POST',

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

                    showToast(9, 'Não foi possível enviar as informações para realização do Logoff');
                }
            });
        });
    });
</script>