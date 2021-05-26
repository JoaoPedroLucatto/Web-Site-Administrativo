<?php

    $sql = "SELECT COUNT(alteracoes_feedback) AS total FROM clientes WHERE alteracoes_feedback = 0";
    $feedback = sqlQueries($conn, $sql, true)[0];

    $sql = "SELECT COUNT(alteracoes_feedback) AS total FROM clientes WHERE alteracoes_feedback = 1";
    $feedbackNovo = sqlQueries($conn, $sql, true)[0];


    $feedbackTotal = $feedback['total'] + $feedbackNovo['total'];

?>
<div class="col s12 m6 l6">
    <div class="card">
        <div class="card-title">
            <a data-link="view/administrativo/iframes/cliente/controlador.php"><img src="../../../../images/icons/feedback_black_24dp.png">Feedbacks</a>
            <span class="card-total"><?php echo $feedbackTotal ?></span>
        </div>
        <div class="card-content">
            <div class="card-conteudo green lighten-4">
                <a><img src="../../../../images/icons/message_black.png">Novo Feedbacks</a>
                <label class="ativos-resultado"><?php echo $feedbackNovo['total'] ?></label>
            </div>
            <div class="card-conteudo">
                <a><img src="../../../../images/icons/message_black.png">Feedback</a>
                <label class="ativos-resultado"><?php echo $feedback['total'] ?></label>
            </div>
        </div>
    </div>
</div>