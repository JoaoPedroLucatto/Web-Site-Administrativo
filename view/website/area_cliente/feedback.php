


<div class="modal-background" data-modal='feedback'> </div>

<div class="my-modal md" data-modal='feedback'>
    <span class="title">
        Feedback
        <img src="images/icons/close-black.png" class="mymodal-close">
    </span>

    <div class="content">
        <div class="row">
            <div class="col s12">
                <span class="value"> Oque achou de nosso trabalho? Deixe aqui sua opinião, sugestão e/ou crítica para sempre nos aprimorarmos e tornar sua experiência cada vez melhor! </span>
            </div>

            <div class="col s12"> <!-- ESPAÇAMENTO --> </div>

            <div class="col s12 textareabox">
                <textarea name="feedback_text" maxlength="2000"><?php echo $cliente['feedback']; ?></textarea>
                <label>Feedback</label>
            </div>
        </div>
    </div>

    <div class="footer">
        <button class="blue darken-3 full-width"> <img src="images/icons/check-white.png"> Salvar </button>
    </div>
</div>



<script type="text/javascript">
    var feedback_salvo = null;

    $(document).ready(function() {
        let modal_feedback = $('div.my-modal[data-modal=feedback]');

        feedback_salvo = modal_feedback.find('textarea[name=feedback_text]').val();


        modal_feedback.find('div.footer > button').on('click', function() {
            let button = $(this);
            let novo_feedback = modal_feedback.find('textarea[name=feedback_text]').val();

            button.prop('disabled', true);

            if (feedback_salvo == novo_feedback) {
                setModal('feedback', false);
                showToast(1, 'Informações salvas <br> Agradecemos pelo seu feedback');
            }

            else {
                showLoading(true);

                $.ajax({
                    url: 'controller/website/area_cliente/cadastrar_feedback.php',
                    method: 'POST',
                    data: 'feedback_text=' + novo_feedback,

                    success: function(response) {
                        console.log('Feedback return: ' + response);
                        showLoading(false);

                        let json = typeof response == 'object' ? response : JSON.parse(response);

                        showToast(json.code, json.message);

                        if (json.code == 1) {
                            feedback_salvo = novo_feedback;
                            setModal('feedback', false);
                        }
                    },

                    error: function(response) {
                        showLoading(false);
                        showToast(9, 'Não foi possível enviar as informações preenchidas no feedback');

                        console.log('Error on send AJAX request to save feedback: ' + JSON.stringify(response));
                    }
                });
            }


            setTimeout(function() {
                button.prop('disabled', false);
            }, 1000);
        });  
    });
</script>