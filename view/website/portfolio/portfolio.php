


<?php

    $select = "SELECT port.id, port.titulo, port.subtitulo_1, port.subtitulo_2, port.link_video, port.extensao_img FROM portfolio port WHERE port.tipo_registro IN (2) AND port.id_statusregistro IN (1) ORDER BY port.id ASC";
    $portfolio_array = sqlQueries($conn, $select, true);
?>


<link rel="stylesheet" type="text/css" href="style/css/website/portfolio.css">
<script type="text/javascript" src="style/js/website/portfolio.js"></script>


<div class="col s12 sector slider-margin" data-scrolltop="portfolio">
    <span class="title"> PORTFÓLIO </span>
    <span class="subtitle"> Conheça um pouco de meu trabalho em alguns projetos realizados com outros clientes! </span>

    <div class="portfoliolist">
        
        <?php

            foreach ($portfolio_array as $portfolio) {
                $html_item = "";

                if (!empty($portfolio['link_video'])) {
                    $iframe_url = 'https://www.youtube.com/embed/' . $portfolio['link_video'];

                    $html_item = "<div class='item hide'>
                                    <iframe src='$iframe_url'> </iframe>
                                </div>";
                }

                else {
                    $imagem_url = "uploads/website/portfolio_{$portfolio['id']}";
                    
                    if (!empty($portfolio['extensao_img'])) {
                        $imagem_url .= ".{$portfolio['extensao_img']}";
                    } else {
                        if (file_exists("$imagem_url.jpg")) {
                            $imagem_url .= ".jpg";
                        } else if (file_exists("$imagem_url.jpeg")) {
                            $imagem_url .= ".jpeg";
                        } else {
                            $imagem_url .= ".png";
                        }
                    }

                    $html_item = "<div class='item hide'>
                                    <img src='{$imagem_url}' class='picture lazy-picture'>
                                    <div class='informations'>
                                        <span class='title'> {$portfolio['titulo']} </span>
                                        <span class='subtitle'> {$portfolio['subtitulo_1']} </span>
                                        <span class='subtitle'> {$portfolio['subtitulo_2']} </span>
                                    </div>
                                </div>";
                }


                echo $html_item;
            }

        ?>

    </div>

    <div class="col s12 show-more hide">
        <span> Mostrar Mais </span>
    </div>
</div>



<?php

    $select = "SELECT client.nome_completo, client.feedback 
                FROM clientes client 
                WHERE 
                    client.id_statusregistro IN (1) 
                    AND client.mostrar_feedback = true 
                    AND LENGTH(client.feedback) > 0 
                ORDER BY client.id ASC";
    $feedbacks_array = sqlQueries($conn, $select, true);


    if (count($feedbacks_array) > 0) {
?>
        
        <div class="col s12 sector">
            <span class="title"> OQUE OS CLIENTES DIZEM? </span>


            <div class="col s12 feedback">

<?php
                foreach ($feedbacks_array as $feedback) {
                    echo "<div class='item'>
                            <span class='texto'> " . $feedback['feedback'] . " </span>
                        
                            <span class='cliente'> " . $feedback['nome_completo'] . " </span>
                        </div>";
                }
?>
            </div>
        </div>
<?php
    }
?>